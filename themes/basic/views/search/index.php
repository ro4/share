<?php 
	$this->pageTitle="搜索{$word}的结果";
?>
<div class="span9">
	<div id="header">
		<h4 class="">搜索"<?php echo $word;?>"的结果 <span class="pull-right muted"><?php echo $count;?>条记录</span></h4>
	</div>
	<div id="search_content">
		<!-- 循环内容 -->
		<ul>
			<?php 
				foreach($data_models as $data_model):
			?>
			<li class="item">
				<p>
					<a target="_blank" href="<?php echo $this->createUrl('data/index',array('id'=>$data_model['id']));?>">
						<?php 
							echo str_replace($word, "<span style='color:red;'>{$word}</span>", $data_model['data_title'])
						?>
					</a>
				</p>
				<div class="muted">
					<?php echo $data_model['download_count'];?>个下载 • <?php echo $data_model['view_count'];?>次浏览 
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