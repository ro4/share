<?php
/**
 * 显示首页控制器
 * @author silenceper
 *
 */
class SiteController extends Controller{
	/**
	 * 显示主页
	 * @param String $order
	 */
	public function actionIndex($order="default"){
		//根据不同的order 选择不同的sql语句
		switch ($order){
			case 'new':
				$sql="select `{{data}}`.`id` as `data_id`,`{{data}}`.`data_title`,`{{data}}`.`add_time`,`{{data}}`.`comment_count`,`{{data}}`.`download_count`,`{{data}}`.`view_count`,`{{data}}`.`comment_state`
				,`{{users}}`.`avatar_file`,`{{users}}`.`uid`
				from `{{data}}`
				left join `{{users}}` on (`{{data}}`.`published_uid`=`{{users}}`.`uid`) 
				order by `{{data}}`.`add_time` desc
				";
				break;
			//热门查看人数排序
			case 'hot':
				$sql="select `{{data}}`.`id` as `data_id`,`{{data}}`.`data_title`,`{{data}}`.`add_time`,`{{data}}`.`comment_count`,`{{data}}`.`download_count`,`{{data}}`.`view_count`,`{{data}}`.`comment_state`
				,`{{users}}`.`avatar_file`,`{{users}}`.`uid`
				from `{{data}}`
				left join `{{users}}` on (`{{data}}`.`published_uid`=`{{users}}`.`uid`) 
				order by `{{data}}`.`view_count` desc
				";
				break;
			//默认根据时间排序
			default:
				$sql = "select `{{home_user}}`.`uid` from `{{home_user}}` order by `{{home_user}}`.`sort`";
				//$sql="select `{{data}}`.`id` as `data_id`,`{{data}}`.`data_title`,`{{data}}`.`add_time`,`{{data}}`.`comment_count`,`{{data}}`.`download_count`,`{{data}}`.`view_count`,`{{data}}`.`comment_state`
				//,`{{users}}`.`avatar_file`,`{{users}}`.`uid`
				//from `{{data}}`
				//left join `{{users}}` on (`{{data}}`.`published_uid`=`{{users}}`.`uid`) 
				//order by `{{data}}`.`add_time` desc
				//";
				break;
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
		
		//获取话题
		$topic_models=Topic::model()->findAll(array(
				'select'=>'id,topic_title',
				'order'=>'discuss_count desc',
				'limit'=>'25',
			));
		$this->pageTitle="首页";
		$this->render('index',array(
			'models'=>$models,
			'pages'=>$pages,	
			'topic_models'=>$topic_models,			
		));
	}
	
	/**
	 * 验证登入
	 */
	public function actionCheckLogin()
	{
		$model=new LoginForm;
	
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$this->redirect(Yii::app()->request->urlReferrer);
			}else{
				$this->error("用户名或密码错误");
			}
		}else{
			$this->error('错误的提交方式');
		}
	}

	/**
	 * 用户注册
	 * 
	 */
	public function actionRegister(){
		//已经登入的用户不再现实
		if(!Yii::app()->user->isGuest){
			Yii::app()->request->redirect(Yii::app()->homeUrl);
		}
		$this->render('register');
	}
	
	/**
	 * 用户登入
	 * 
	 */
	public function actionCheckRegister(){
		//已经登入的用户不再现实
		if(!Yii::app()->user->isGuest){
			Yii::app()->request->redirect(Yii::app()->homeUrl);
		}
		
		$model=new RegisterForm();
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		//获取信息
		if(isset($_POST['RegisterForm'])){
			$model->attributes=$_POST['RegisterForm'];
			//验证并是实现注册登入
			if($model->validate() && $model->register()){
				$this->success('注册成功，',Yii::app()->homeUrl);
			}else{
				//var_dump($model->errors);
				//exit();
				$this->error("注册失败",$this->createUrl('site/register'));
			}
		}else{
			$this->error('请求错误',$this->createUrl('site/register'));
		}
		
	}
	
	/**
	 * 退出
	 */
	public function actionLogout(){
		//未登入的用户跳转至登入页面
		if(Yii::app()->user->isGuest){
			Yii::app()->request->redirect($this->createUrl('/'));
		}
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->request->urlReferrer);
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	/**
	 * 通过uid得到分享的资料
	 */
	
	public function getDataByUid($uid){
		$criteria=new CDbCriteria();
		$criteria->condition="published_uid=? and state=?";
		$criteria->limit=5;
		$criteria->order="view_count desc";
		$criteria->params=array($uid,1);
		$models=Data::model()->findAll($criteria);
		return $models;
	}

	/**
	 * 通过uid得到用户资料
	 */
	public function getUserInfoByUid($uid ){
		$model = Users::model()->findByPk($uid);
		return $model;
	}

	/**
	 * 获取分享数目
	 */
	public function getDataCount($uid){
		return Data::model()->count('published_uid=:uid and state=:state',array(':uid'=>$uid,':state'=>1));
	}

}