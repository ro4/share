<?php
/**
 * 话题
 * @author silenceper
 *
 */

class TopicController extends Controller {
	//显示有关toipc的问题
	public function actionIndex($id){
		//搜索内容
		$sql="select `{{data}}`.`id`,`{{topic}}`.`topic_title`,`{{data}}`.`data_title`,`{{data}}`.`state`,`{{data}}`.`download_count`,`{{data}}`.`view_count` from `{{data}}` left join `{{topic_data}}` on (`{{topic_data}}`.`data_id`=`{{data}}`.`id`) left join `{{topic}}` on (`{{topic}}`.`id`=`{{topic_data}}`.`topic_id`) where `{{topic}}`.`id`=$id ";
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
		));
	}

	public function actionShowAll(){
		$sql="select `{{topic}}`.`id`,`{{topic}}`.`topic_title`,`{{topic}}`.`discuss_count` from `{{topic}}` where `{{topic}}`.`discuss_count` != 0 order by `{{topic}}`.`discuss_count` desc";
		$topic_models=Yii::app()->db->createCommand($sql)->queryAll();
		$connection=Yii::app()->db;
		$criteria = new CDbCriteria;
		$count=count($topic_models);
		$pages = new CPagination($count);
		$pages->pageSize = 20;
		$pages->applylimit($criteria);
		$topic_models=$connection->createCommand($sql." LIMIT :offset,:limit");
		$topic_models->bindValue(':offset', $pages->currentPage*$pages->pageSize);
		$topic_models->bindValue(':limit', $pages->pageSize);
		$topic_models=$topic_models->queryAll();
		$this->render('all',array(
			'count'=>$count,
			'topic_models'=>$topic_models,
			'pages'=>$pages,
		));
	}
}

?>