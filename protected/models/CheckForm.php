<?php

class CheckForm extends CFormModel
{
	public $remark;

	public function rules()
	{
		return array(
			array('remark', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'remark'=>'备注',
		);
	}
	
}
