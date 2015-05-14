<?php 
	$this->pageTitle='分享资料';
?>
<div class="span9">
	<div id="header">
		<h4 class="">分享资料</h4>
	</div>
	<div class="input">
		<h6 class="text-info">标题:</h6>
		<?php 
			$model=new PublishForm();
			$form=$this->beginWidget('CActiveForm',array(
				'action'=>$this->createUrl('publish/checkcreate'),
				'id'=>'create-form',
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				'enableClientValidation'=>true,
				'enableAjaxValidation'=>true,
				'clientOptions'=>array(
						'validateOnSubmit'=>true,
				),
			));
			?>
			<div id="title">
				<?php echo $form->textField($model,'title',array('class'=>'span8'));?>
			</div>
			<div id='data'>
			<h6 class="text-info">上传资料:</h6>
				<?php echo $form->fileField($model,'data',array('class'=>'span8'));?>
			</div>
			<div id='state'>
			<h6 class="text-info">是否公开:</h6>
				<?php echo $form->dropDownList($model,'state',Data::model()->getStateOptions(),array('prompt'=>'请选择'));?>
			</div>
			<div id="content">
				<h6 class="text-info">资料详情(选填):</h6>
				<?php echo $form->textArea($model,'detail',array('class'=>'span8 input_area'));?>
			</div>
			<div>
				<span>添加话题：</span>
				<div id="topic_list" style="display:inline-block;">
					
				
					<a href="javascript:;" id="edit_topic_btn"><i class="icon-pencil"></i>  编辑话题</a>
				</div>
				<div id="topic_add" style="display:none;">
					<input type="text" class="span3" id="edit_value" placeholder="创建或搜索话题"/>
					<a class="btn btn-info " id="submit-edit">添加</a>
				</div>
			</div>
			
			<div id="publish_sub">
				<input type="submit" value="确认分享" class="btn btn-success btn-large pull-right"/>
			</div>
		<?php 
			$this->endWidget();
		?>
	</div>
</div>
<div class="span3" id="sidebar">
	<h5 class="muted"> 资料标题: </h5>
	<p class="muted">请用准确的语言描述您发布的资料</p>
	<h5 class="muted">  资料详情: </h5>
	<p class="muted">详细补充您的资料描述, 并提供一些相关的素材以供其他人更多的了解您所分享的资料。</p>
	<h5 class="muted">选择话题</h5>
	<p class="muted">选择一个或者多个合适的话题, 让您发布的资料得到更多有相同兴趣的人参与. 所有人可以在您发布资料之后添加和编辑该问题所属的话题</p>
</div>
<script type="text/javascript">
	$(function(){
		//点击编辑话题
		$("#edit_topic_btn").click(function(){
			$(this).fadeOut();
			$('#topic_add').fadeIn();
			});
		//点击话题添加
		$('#submit-edit').click(function(){
			var edit_value=$('#edit_value').val();
			if(edit_value==''){
				alert('不能添加空话题');
				return;
				}
			//话题不为空时 将添加话题显示
			var add_val="<a href='javascript:;' onclick='remove_topic(this)' class='topic_name label label-info'><span>"+edit_value+"</span><i class='icon-white icon-remove'></i><input type='hidden' name='topic[]' value='"+edit_value+"'</a>";
			$('#topic_list').prepend(add_val);
			$('#edit_value').val('');
			});
		})
		function remove_topic(t){
			$(t).remove();
		}
</script>
