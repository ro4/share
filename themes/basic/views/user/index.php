 <?php 
 	$this->pageTitle=$user_model->username.'的个人主页';
 ?>
 <div class="span12" style="background-color:white;min-height:500px;">
	<!-- 显示头像 -->
	<div class="user_top">
		<div id="avatar_file" class="pull-left">
			<img src="<?php echo str_replace('_50', '_180', $user_model->avatar_file); ?>" class="img-polaroid"/>
		</div>
		<div class="pull-left" id="user_info">
			<ul>
				<li>
					昵称:<?php echo $user_model->username; ?>					
				</li>	
				<li>
					邮箱:<?php echo $user_model->email; ?>
				</li>
				<!-- <li>
					性别:<?php echo $user_model->sex; ?>
				</li>
				<li>
					生日:<?php echo date('Y-m-d',$user_model->birthday); ?>
				</li> -->
				<li>
					注册时间:<?php echo date('Y-m-d',$user_model->reg_time); ?>					
				</li>
				<li>
					上次登入:<?php echo date('Y-m-d',$user_model->last_login); ?>					
				</li>
				<li>
					<?php if(!$user_model->authority && !$check_model){?>
					<a href="/user/check" class="btn btn-success">申请审核</a>
					<?php } else if($user_model->authority) {?>
					<a href="/publish/index" class="btn btn-success">发布资料</a>
					<?php } else if($check_model) {?>
					<a class="btn btn-success" disabled="disabled">审核中，请等待..</a>
					<?php }?>
				</li>			
			</ul>
			
		</div>
	</div>
	
	<!-- user_bottom  -->
	<?php 
		switch (isset($_GET['type']) ? $_GET['type'] : '') {
			case 'focus':
				$this->renderPartial('//user/_focus',array(
					'focus_models'=>$models,
					'pages'=>$pages,
					'count'=>$count,
				));

				break;
			case 'comment':
				$this->renderPartial('//user/_comment',array(
					'comment_models'=>$models,
					'pages'=>$pages,
					'count'=>$count,
				));

				break;
			default:
				$this->renderPartial('//user/_self',array(
					'models'=>$models,
					'pages'=>$pages,
					'count'=>$count,
				));
				break;
		}
	 ?>
	</div>