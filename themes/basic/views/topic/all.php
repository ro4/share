<?php 
	$this->pageTitle="所有话题";
?>
<div class="span9">
	<div id="header">
		<h4 class="">所有话题</h4>
	</div>
	<div id="search_content">
		<!-- 循环内容 -->
		<ul>
			<?php 
				foreach($topic_models as $topic_model):
			?>
			<li class="item">
					<a target="_blank" href="<?php echo $this->createUrl('topic/index',array('id'=>$topic_model['id']));?>">
						<?php 
							echo  $topic_model['topic_title'];
						?>
					</a>
				<div class="muted pull-right">
					<?php echo $topic_model['discuss_count'];?>个资料 
				</div>
			</li>
			<?php 
				endforeach;
			?>
		</ul>
		<div class="pages pull-right">
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
<div class="span3">
	
</div>

