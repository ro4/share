<?php
/**
 * 搜索控制器
 * @author silenceper
 *
 */
class SearchController extends Controller{
	//搜索处理
	public function actionIndex($word){
		//获取搜索关键字
		if($word==''){
			$this->error('未填入搜索关键字');
		}
		
		//搜索内容
		$sql="select `id`,`data_title`,`download_count`,`view_count` from {{data}} where `data_title` like '%{$word}%'";
		$data_models=Yii::app()->db->createCommand($sql)->queryAll();
		$connection=Yii::app()->db;
		$criteria = new CDbCriteria;
		$count=count($data_models);
		$pages = new CPagination($count);
		$pages->pageSize = 10;
		$pages->applylimit($criteria);
		$data_models=$connection->createCommand($sql." LIMIT :offset,:limit");
		$data_models->bindValue(':offset', $pages->currentPage*$pages->pageSize);
		$data_models->bindValue(':limit', $pages->pageSize);
		$data_models=$data_models->queryAll();
		

		
		$this->render('index',array(
			'count'=>$count,
			'data_models'=>$data_models,
			'pages'=>$pages,
			'word'=>$word,				
		));
	}
	
}

?>