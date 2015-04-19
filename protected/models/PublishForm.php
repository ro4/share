<?php

class PublishForm extends CFormModel
{
	public $title;
	public $detail;
	public $data;


	public function rules()
	{
		return array(
			array('title', 'required'),
			array('data', 'required'),
			array('data', 'file', 'types'=>'jpg', 'maxSize'=>307200, 'allowEmpty'=>TRUE),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'title'=>'标题',
			'data'=>'资料',
			'detail'=>'问题描述',
		);
	}
	
}
