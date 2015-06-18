		<div class="user_bottom span11">
			<ul class="nav nav-tabs">
				<li class="active"><a href="javascript:;">分享 (<?php echo $count ?>)</a></li>
			    <li><a href="<?php echo $this->createUrl('user/index',array('uid'=>$_GET['uid'])); ?>&type=focus">关注</a></li>
			    <li><a href="<?php echo $this->createUrl('user/index',array('uid'=>$_GET['uid'])) ; ?>&type=comment">评论</a></li>
			</ul>
			<div class="tab-content">

			<div class="tab-pane active" id="focus">
			  	<!-- focus -->
				<ul style="list-style-type:square">
				<?php foreach($models as $model): ?>
				<li>
					<a href="<?php echo $this->createUrl('data/index',array('id'=>$model['id'])) ?>" target="_blank">
						<?php echo $model['data_title'] ?> 
					</a>
					<?php if($_GET['uid']==Yii::app()->user->id):?>
					<div class="pull-right answer-submit">
					<a href='<?php echo $this->createUrl('data/delete',array('id'=>$model['id']));?>' class="btn btn-info span2">删除</a>
					</div>
				<?php endif;?>
					<br/>
					<div class="muted info">
						&nbsp;&nbsp;&nbsp;浏览数:
							<?php echo $model['view_count'] ?> 
						&nbsp;&nbsp;&nbsp;下载次数:
							<?php echo $model['download_count'] ?> 
						&nbsp;&nbsp;&nbsp;提问时间:
						<?php echo date('Y-m-d',$model['add_time']); ?> 				
					</div>
				</li>
				<?php endforeach; ?>
				</ul>
				<div class="pages">
					<?php 
			          //分页
			           $this->widget('CLinkPager', array(
								 'header'=>'',
								 'pages' => $pages,
						));
			  		 ?>
				</div>
			</div>
			</div>
		</div>