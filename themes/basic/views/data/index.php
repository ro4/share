<?php 
	$this->pageTitle="{$data_model['data_title']}";
	Yii::app()->clientScript->registerScriptFile(yii::app()->theme->baseUrl.'/js/common.js');
?>
<div class="span9">
	<div id="header">
		<h4 class="title" style="border-bottom:1px dotted #c1cad4"><?php echo $data_model['data_title']?>
			<?php if(!Yii::app()->user->isGuest):?>
				<?php 
					if($data_model['is_focus']):
				?>	
					<a href="javascript:d_focus(<?php echo $data_model['id']?>);" class="btn  btn-info btn-mini pull-right btn-inverse" id="focus_btn">取消关注</a>
				<?php else:?>
					<a href="javascript:d_focus(<?php echo $data_model['id']?>);" class="btn btn-info btn-mini pull-right" id="focus_btn">关注</a>
				<?php endif;?>
			<?php endif;?>
		</h4>
	</div>
	<div class="detail">
		<div class="detail_content"><?php echo $data_model['data_detail']?></div>
		<div class="detail_info">
			<?php echo date('m-d H:i:s',$data_model['add_time'])?>
		</div>	
		<div class="clearfix"></div>
		资料：<div class="topics">
					<a href='<?php echo $this->createUrl('data/download',array('id'=>$data_model['id']));?>' class="label label-info">下载</a>
			</div>
	</div>
	<!-- 回复 -->
	<div class="answer">
		<!-- 发表回复 -->
		<div class="answer_count">
			<h4><?php echo count($comment_models); ?>条评论</h4>
		</div>
		<!-- 回复列表 -->
		<div class="answer_content">
			<ul>
				<?php foreach ($comment_models as $comment_model):?>
				<li>
					<div class="pull-left">
						<a href="<?php echo $this->createUrl('user/index',array('uid'=>$comment_model['uid']))?>"><img src="<?php echo $comment_model['avatar_file'];?>" width="50px;"/></a>
					</div>
					<div class="answer_main pull-left span7">
						<a href="<?php echo $this->createUrl('user/index',array('uid'=>$comment_model['uid']))?>"><?php echo $comment_model['username']?></a>
						<span style="font-size:12px;" class="muted">评论于:<?php echo date('Y-m-d H:i:s',$comment_model['add_time'])?></span>
						<p style="padding:10px 0;"><?php echo $comment_model['content']?></p>
					</div>
					<div class="clearfix"></div>
				</li>
				<?php endforeach;?>
			</ul>
		</div>

		<div class="answer_input">
			<?php if(Yii::app()->user->isGuest):?>
			<!-- 未登入用户 -->
			<p class="text-center">要回复问题请先<a href="#loginModal" data-toggle="modal">登入</a>或<a href="<?php echo $this->createUrl('site/register')?>">注册</a></p>
			<?php else:?>
			<!-- answer form start -->
			<?php $form=$this->beginWidget('CActiveForm', array(
			    	'action'=>$this->createUrl('Comment/checkcomment'),
					'id'=>'comment-form',
					'enableClientValidation'=>true,
		    		'enableAjaxValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); 
				$model=new CommentForm();
			?>
			<?php echo $form->error($model,'content'); ?>
			<?php echo $form->textArea($model,'content',array('class'=>'span8'));?>
			<div class="pull-left">
				<a href="<?php echo $this->createUrl('user/index',array('uid'=>Yii::app()->user->id));?>">
					<img class="img-rounded"  src="<?php echo Yii::app()->user->getState('userInfo')->avatar_file;?>" width="50px"/>&nbsp;&nbsp; <?php echo Yii::app()->user->getState('userInfo')->username;?>
				</a>
			</div>
			<div class="pull-right answer-submit">
				<!-- hidden input -->
				<?php echo $form->hiddenField($model,'data_id',array('value'=>$data_model['id']))?>
				<input type="submit" class="btn btn-info span2" value="提交评论"/>
			</div>
			<div class="clearfix"></div>
			
			<?php $this->endWidget();?>
			<!-- end form -->
			<?php endif;?>
		</div>
	</div>
</div>
<div class="span3" id="sidebar">
	<div class="sidebar_1" style="padding-top:0px;">
		<a href="<?php echo $this->createUrl('user/index',array('uid'=>$data_model['uid'])) ?>">
			<img class="img-polaroid" src="<?php echo str_replace('_50', '_180', $data_model['avatar_file']);?>"  style="width:120px"/><br/>
			<?php echo $data_model['username']?>
		</a>
		<br/>
		<?php 
			$topics=$this->getTopicByDataId($data_model['id']);
		?>
		<?php if($topics):?>
			<h5>提到的话题:</h5>
			<div class="topics">
				<?php foreach ($topics as $topic):?>
					<a href='<?php echo $this->createUrl('topic/index',array('id'=>$topic['topic_id']));?>' class="label label-info"><?php echo $topic['topic_title']?></a>
				<?php endforeach;?>
			</div>
		<?php endif;?>
	</div>
	<div class="sidebar_2" style="padding-top:0px;">
		<h4>问题状态</h4>
		<p class="text-success">
			浏览次数:<?php echo $data_model['view_count']?><br/>
			下载次数:<?php echo $data_model['download_count']?><br/>
			关注次数:<?php echo $data_model['focus_count']?>
		</p>
	</div>
</div>	
<script type="text/javascript">
	function d_focus(id){
		//ajax 提交
		$.post('<?php echo $this->createUrl('data/dofocus');?>',{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},function(data){
			//解析json
			var data=eval("("+data+")");
			if(data.status){
				if(data.mesg=='关注成功'){
					$('#focus_btn').addClass('btn-inverse');
					$('#focus_btn').text('取消关注');
				}else{
					$('#focus_btn').removeClass('btn-inverse');
					$('#focus_btn').text('关注');
				}
			}else{
				alert(data.mesg);
			}
		});
	}
	$(function(){
		$('.question_comment>ul>li').hover(function(){
			//显示
			$(this).find('.question_reply_btn').show();
		},function(){
			//隐藏
			$(this).find('.question_reply_btn').hide();
		});
		$('.answer_comment>ul>li').hover(function(){
			//显示
			$(this).find('.answer_reply_btn').show();
		},function(){
			//隐藏
			$(this).find('.answer_reply_btn').hide();
		})
	})
</script>
