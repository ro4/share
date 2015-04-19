<?php

/**
 * This is the model class for table "{{data}}".
 *
 * The followings are the available columns in table '{{data}}':
 * @property integer $id
 * @property string $data_detail
 * @property string $data_detail
 * @property string $add_time
 * @property string $update_time
 * @property string $published_uid
 * @property string $view_count
 * @property string $focus_count
 * @property string $comment_count
 * @property string $download_count
 * @property string $data_url
 * @property integer $state
 * @property integer $comment_state
 * @property string $ip
 */
class Data extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Data the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{data}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data_title, add_time, update_time, published_uid, ip, data_url', 'required'),
			array('data_title', 'length', 'max'=>255),
			array('add_time, update_time, published_uid, download_count, view_count, focus_count, comment_count', 'length', 'max'=>10),
			array('ip', 'length', 'max'=>15),
			array('data_detail', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, data_title, data_detail, add_time, update_time, published_uid, download_count, view_count, focus_count, comment_count, data_url, state, comment_state, ip', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'data_title' => 'Data Title',
			'data_detail' => 'Data Detail',
			'add_time' => 'Add Time',
			'update_time' => 'Update Time',
			'published_uid' => 'Published Uid',
			'view_count' => 'View Count',
			'focus_count' => 'Focus Count',
			'comment_count' => 'Comment Count',
			'download_count'=> 'Download Count',
			'data_url' => 'Data URL',
			'state' => 'State',
			'comment_state' => 'Comment State',
			'ip' => 'Ip',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('data_title',$this->data_title,true);
		$criteria->compare('data_detail',$this->data_detail,true);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('published_uid',$this->published_uid,true);
		$criteria->compare('view_count',$this->view_count,true);
		$criteria->compare('focus_count',$this->focus_count,true);
		$criteria->compare('comment_count',$this->comment_count,true);
		$criteria->compare('download_count',$this->download_count,true);
		$criteria->compare('data_url',$this->data_url);
		$criteria->compare('state',$this->state);
		$criteria->compare('comment_state',$this->comment_state);
		$criteria->compare('ip',$this->ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}