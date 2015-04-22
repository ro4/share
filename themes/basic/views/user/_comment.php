		<div class="user_bottom span11">
			<ul class="nav nav-tabs">
				<li><a href="<?php echo $this->createUrl('user/index',array('uid'=>$_GET['uid'],'type'=>'self')) ?>">提问</a></li>
			    <li><a href="<?php echo $this->createUrl('user/index',array('uid'=>$_GET['uid'],'type'=>'focus')); ?>">关注</a></li>
			    <li class="active"><a href="<?php echo $this->createUrl('user/index',array('uid'=>$_GET['uid'],'type'=>'answer')) ; ?>">回答(<?php echo $count ?>)</a></li>
			</ul>
			<div class="tab-content">

			<div class="tab-pane active" id="focus">
			  	<!-- focus -->
				<ul style="list-style-type:square">
				<?php foreach($comment_models as $commetnt_model): ?>
				<li>
					<a href="<?php echo $this->createUrl('question/index',array('id'=>$commetnt_model['id'])); ?>" target="_blank">
						<?php echo $commetnt_model['data_title'] ?> 
					</a>
					<br/>
					<div class="muted info">
						下载数:
							<?php echo $commetnt_model['download_count'] ?> 
						&nbsp;&nbsp;&nbsp;浏览数:
							<?php echo $commetnt_model['view_count'] ?> 
						&nbsp;&nbsp;&nbsp;提问时间:	
						<?php echo date('Y-m-d',$commetnt_model['add_time']); ?> 
					</div>
				</li>
				<?php endforeach; ?>
				</ul>
			</div>
			</div>
		</div>