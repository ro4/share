<?php

class CommentController extends Controller {
	
	/**
	 * 验证回答
	 */
	public function actionCheckComment(){
		//登入判断
		$this->checkAuth();
		$model=new CommentForm();
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		//var_dump($_POST['AnswerForm']);
		//启用事物处理 因为需要插入 Answer表及Question字段中的answer_count 字段
		$transaction=Yii::app()->db->beginTransaction();
		try {
			$comment_model=new Comment();
			$comment_model->content=$_POST['CommentForm']['content'];
			$comment_model->data_id=$_POST['CommentForm']['data_id'];
			$comment_model->uid=Yii::app()->user->id;
			$comment_model->add_time=time();
			$comment_model->ip=Yii::app()->request->userHostAddress;
			if(!$comment_model->save()){
				throw new ErrorException('评论失败1');
			}
				
			//更改question表中的answer_count 信息
			if(!Data::model()->updateByPk($comment_model->data_id, array('comment_count'=>new CDbExpression('comment_count+1')))){
				throw new ErrorException('评论失败2');
			}
				
			$transaction->commit();
			$this->redirect(Yii::app()->request->urlReferrer );
			//$this->success('回答成功');
		}catch(Exception $e){
			$transaction->rollBack();
			//exit($e->getMessage());
			$this->error($e->getMessage());
		}
	
	}
}

?>