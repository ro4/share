<?php
/**
 * 用户个人中心
 */
class UserController extends BaseController {
	public function actionIndex($uid){
		//自己才能看自己的个人中心
		if($uid!=Yii::app()->user->id){
			$this->redirect('/');
		}

		//显示用户资料
		$user_model=Users::model()->findByPk($uid);
		
		//获取ype
		if(isset($_GET['type']) && $_GET['type']=='focus'){
			//获取关注的问题
			$sql="select `{{data}}`.`id`,`{{data}}`.`data_title`,`{{data}}`.`add_time`,`{{data}}`.`published_uid`,`{{data}}`.`state`,`{{data}}`.`download_count`,`{{data}}`.`view_count` from `{{data}}` left join `{{data_focus}}` on (`{{data_focus}}`.`data_id`=`{{data}}`.`id`) where `{{data_focus}}`.`uid`=$uid order by `{{data_focus}}`.`add_time` desc";

		}elseif(isset($_GET['type']) && $_GET['type']=='comment'){
			//获取回复的问题
			$sql="select `{{data}}`.`id`,`{{data}}`.`data_title`,`{{data}}`.`add_time`,`{{data}}`.`published_uid`,`{{data}}`.`state`,`{{data}}`.`download_count`,`{{data}}`.`view_count` from `{{data}}` left join `{{comment}}` on (`{{comment}}`.`data_id`=`{{data}}`.`id`) where `{{comment}}`.`uid`=$uid";

		}else{
			//获取自己发布的问题
			$sql="select `{{data}}`.`id`,`{{data}}`.`data_title`,`{{data}}`.`add_time`,`{{data}}`.`published_uid`,`{{data}}`.`state`,`{{data}}`.`download_count`,`{{data}}`.`view_count` from `{{data}}` where `{{data}}`.`published_uid`=$uid order by `{{data}}`.`add_time` desc";
		}

		$connection=Yii::app()->db;
		$criteria = new CDbCriteria;
		$models=$connection->createCommand($sql)->queryAll();
		$count=count($models);
		$pages = new CPagination($count);
		$pages->pageSize = 10;
		$pages->applylimit($criteria);
		$models=$connection->createCommand($sql." LIMIT :offset,:limit");
		$models->bindValue(':offset', $pages->currentPage*$pages->pageSize);
		$models->bindValue(':limit', $pages->pageSize);
		$models=$models->queryAll();	
		$this->render('index',array(
				'user_model'=>$user_model,
				'models'=>$models,
				'pages'=>$pages,
				'count'=>$count,
			));
	}	

	/**
	 * 获取自己发布的问题
	 * return model pages
	 */
	private function getSelf(){
		
	}

	/**
	 * 获取关注的问题
	 * return model pages
	 */
	private function getFocus(){
		
	}

	/**
	 * 获取回答的问题相关信息
	 * return model
	 */
	private function getAnswer(){
		
	}
}

?>