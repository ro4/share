		<div class="user_bottom span11">
			<ul class="nav nav-tabs">
				<li><a href="<?php echo $this->createUrl('user/index',array('uid'=>$_GET['uid'])) ?>&type=self">分享</a></li>
			    <li  class="active"><a href="javascript:;">关注(<?php echo $count ?>)</a></li>
			    <li><a href="<?php echo $this->createUrl('user/index',array('uid'=>$_GET['uid'])) ; ?>&type=comment">评论</a></li>
			</ul>
			<div class="tab-content">

			<div class="tab-pane active" id="focus">
			  	<!-- focus -->
				<ul style="list-style-type:square">
				<?php foreach($focus_models as $focus_model): ?>
				<li>
					<a href="<?php echo $this->createUrl('data/index',array('id'=>$focus_model['id'])) ?>" target="_blank">
						<?php echo $focus_model['data_title'] ?> 
					</a>
					<br/>
					<div class="muted info">
						下载数:
							<?php echo $focus_model['download_count'] ?> 
						&nbsp;&nbsp;&nbsp;浏览数:
							<?php echo $focus_model['view_count'] ?> 
						&nbsp;&nbsp;&nbsp;时间:
						<?php echo date('Y-m-d',$focus_model['add_time']); ?> 
					</div>
				</li>
				<?php endforeach; ?>
				</ul>
			</div>
			</div>
		</div>