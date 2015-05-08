<?php

class QuestionController extends BaseController {
	/**
	 * 显示问题列表
	 */
	public function actionIndex(){


		$sql="select `{{data}}`.`id`,`{{data}}`.`data_title`,`{{data}}`.`add_time`,`{{data}}`.`update_time`,`{{data}}`.`download_count`,`{{data}}`.`view_count`,`{{data}}`.`focus_count`,`{{data}}`.`comment_count`,`{{data}}`.`ip`,`{{users}}`.`username`,`{{users}}`.`uid`
				from `{{data}}`				
				left join `{{users}}` on (`{{users}}`.`uid` = `{{data}}`.`published_uid`)";

		$condition=array();
		//根据uid搜索
		if(isset($_GET['uid'])){
			$condition[]="`{{users}}`.`uid`={$_GET['uid']} ";
		}

		if(isset($_POST['content'])){
			$condition[]=" `{{data}}`.`data_title` like '%{$_POST['content']}%'";
		}

		$conditions=implode('AND', $condition);
		//var_dump($conditions);
		if($conditions){
			$conditions=' where '.$conditions;
			$sql.=$conditions;
		}
		$sql.=" order by `{{data}}`.`add_time` desc ";
		$connection=Yii::app()->db;
		$criteria = new CDbCriteria;
		$models=$connection->createCommand($sql)->queryAll();
		$count=count($models);
		$pages = new CPagination($count);
		$pages->pageSize = 12;
		$pages->applylimit($criteria);
		$models=$connection->createCommand($sql." LIMIT :offset,:limit");
		$models->bindValue(':offset', $pages->currentPage*$pages->pageSize);
		$models->bindValue(':limit', $pages->pageSize);
		$models=$models->queryAll();
		$this->render('index',array(
				'models'=>$models,
				'pages'=>$pages,
				'count'=>$count,
		));
	}
	
	
	/**
	 * 
	 * 更新question中的信息
	 *
	 */
	public function actionUpdate($id){
		$sql="select `{{data}}`.`id`,`{{data}}`.`data_title`,`{{data}}`.`data_detail`,`{{data}}`.`add_time`,`{{data}}`.`update_time`,`{{data}}`.`published_uid`,`{{data}}`.`state`,`{{data}}`.`comment_state`,`{{data}}`.`comment_count`,`{{data}}`.`view_count`,`{{data}}`.`focus_count`,`{{data}}`.`comment_count`,`{{data}}`.`download_count`,`{{data}}`.`state`,`{{data}}`.`ip`,`{{users}}`.`username` from `{{data}}` 
		left join `{{users}}` on (`{{users}}`.`uid`=`{{data}}`.`published_uid`) 
		where `{{data}}`.`id`=:id";
		$model=Yii::app()->db->createCommand($sql)->queryRow(true,array(':id'=>$id));
		$this->render('update',array(
				'model'=>$model,
			));
	}

	/**
	 *
	 * 处理更新 
	 *
	 */
	public function actionCheckUpdate(){
		if (!isset($_POST)) {
			$this->error('错误的访问方式');
		}

		//开始处理提交信息
		//var_dump($_POST);
		$m=Data::model()->updateByPk($_POST['id'],array(
			'data_title'=>htmlspecialchars($_POST['data_title']),
			'data_detail'=>htmlspecialchars($_POST['data_detail']),
			'comment_state'=>$_POST['comment_state'],
			'update_time'=>time(),
			));
		if(false!==$m){
			$this->error('更新成功');
		}

	}


	/**
	 * 删除信息
	 * 多表删除  事物处理
	 * 删除 question 中信息
	 * 删除 answer 表中信息
	 * 删除 question 
	 * 更新topic中次数
	 */
	public function actionDelete($id){		
		$transaction=Yii::app()->db->beginTransaction();
		try {
			
			//删除question 表信息
			if(!Data::model()->deleteByPk($id)){
				throw new Exception("删除data表失败");
			}

			//删除 topic_question 表 首先把 topic  id 查找出来
			//获取topic id
			$topic_ids=TopicData::model()->findAll(array(
					'select'=>'topic_id',
					'condition'=>'data_id=:data_id',
					'params'=>array(':data_id'=>$id),
				));

			//更新 topic次数
			foreach ($topic_ids as $model) {
				//更新topic 次数
				if(!Topic::model()->updateByPk($model->topic_id, array('discuss_count'=>new CDbExpression('discuss_count-1')))){
					throw new ErrorException('更新失败');
				}
			}

			//删除topic_question 表中信息
			if(false === TopicData::model()->deleteAll('data_id=:data_id',array('data_id'=>$id))){
				throw new ErrorException('删除topic_data中信息失败');
			}

			//获取comment 中id
			$comment_models=Comment::model()->findAll(array(
					'select'=>'id',
					'condition'=>'data_id=:data_id',
					'params'=>array(
						':data_id'=>$id,
						),
				));


			//删除answer 表中信息
			if(false === Comment::model()->deleteAll('data_id=:data_id',array('data_id'=>$id))){
				throw new ErrorException('删除comment中信息失败');
			}

			//删除question_focus 中信息
			if(false === DataFocus::model()->deleteAll('data_id=:data_id',array('data_id'=>$id))){
				throw new ErrorException('删除data_focus 中信息失败');
			}

			$transaction->commit();
			$this->success('删除成功');
		}catch(Exception $e){
			$transaction->rollBack();
			exit($e->getMessage());
			$this->error($e->getMessage());
		}

	}
}

?>