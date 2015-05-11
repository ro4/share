<?php 
/**
 * 首页管理
 */

class HomeController extends BaseController {
	/*
	 * 用户管理
	 */
	public function actionUser(){
		$sql="select `{{home_user}}`.`id`,`{{home_user}}`.`uid`,`{{home_user}}`.`add_time`,`{{home_user}}`.`state`,`{{home_user}}`.`sort`,`{{users}}`.`avatar_file`,`{{users}}`.`authority`,`{{users}}`.`username`
		from `{{home_user}}`				
		left join `{{users}}` on (`{{users}}`.`uid` = `{{home_user}}`.`uid`)";

		$sql.=" order by `{{home_user}}`.`sort`";
		$connection = Yii::app()->db;
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

	/*
	 *话题管理
	 */
	public function actionTopic(){

	}

	public function actionAddUser(){
		if(!$_POST){
			return $this->render('addUser');
		}
		if(HomeUser::model()->exists('uid=?', array($_POST['uid']))){
			$this->error('已存在!');
		}
		$ud = new HomeUser;
		$ud->uid = $_POST['uid'];
		$ud->state = $_POST['state'];
		$ud->sort = $_POST['sort'];
		$ud->add_time = time();

		if($ud->save()){
			$this->success('添加成功!',$this->createUrl('user'));
		} else {
			$this->error(var_dump($user->errors));
		}
	}
	/**
	 * 获取分享数目
	 */
	public function getDataCount($uid){
		return Data::model()->count('published_uid=:uid',array(':uid'=>$uid));
	}
}