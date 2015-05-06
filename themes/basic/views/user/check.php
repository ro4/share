<?php 
	$this->pageTitle='申请审核';
?>
<div class="span9">
	<div id="header">
		<h4 class="">申请审核</h4>
	</div>
	<div class="input">
		<?php 
			$model=new CheckForm();
			$form=$this->beginWidget('CActiveForm',array(
				'action'=>$this->createUrl('user/check'),
				'id'=>'create-form',
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				'enableClientValidation'=>true,
				'enableAjaxValidation'=>true,
				'clientOptions'=>array(
						'validateOnSubmit'=>true,
				),
			));
			?>
			<div id="remark">
				<h6 class="text-info">申请理由:</h6>
				<?php echo $form->textArea($model,'remark',array('class'=>'span8 input_area'));?>
			</div>
			<div id="publish_sub">
				<input type="submit" value="确认申请" class="btn btn-success btn-large pull-right"/>
			</div>
		<?php 
			$this->endWidget();
		?>
	</div>
</div>
<div class="span3" id="sidebar">
	<h5 class="muted"> 审核: </h5>
	<p class="muted">为防止垃圾资料泛滥，本站采用审核制度，只有审核通过的人及单位才具有发布资料的资格。</p>
</div>
