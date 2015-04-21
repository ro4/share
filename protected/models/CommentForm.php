<?php

class CommentForm extends CFormModel
{
	public $content;
	public $data_id;
	public $uid;


	public function rules()
	{
		return array(
			// title is required
			array('content,data_id,uid', 'required'),
			array('uid,data_id','numerical','integerOnly'=>true),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'content'=>'评论内容',
			'data_id'=>'资料ID',
			'uid'=>'用户id',
		);
	}
	
}
