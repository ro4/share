<div class="condition alert alert-info">
	<?php $form = $this->beginWidget('CActiveForm', array(
	    'id'=>'condition-form',
	    'enableAjaxValidation'=>true,
	    'enableClientValidation'=>true,
	    'htmlOptions'=>array('class'=>'form-horizontal'),
	)); ?>
	搜索关键字:<input type="text" name="content"/>	
	<input type="submit" value="查询" class="btn btn-info">
	<span class="text-error">共有 <?php echo $count; ?>个资料</span>
	<?php $this->endWidget(); ?>

</div>
<!-- 显示列表 -->
<div class="content">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>标题</th>
				<th>作者</th>
				<th>时间</th>
				<th>下载数</th>
				<th>关注数</th>
				<th>评论数</th>
				<th>浏览数</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($models as $model):?>
			<tr>
				<td><?php echo $model['id']?></td>		
				<td><a href="/data/index?id=<?php echo $model['id'] ?>" target="_blank"><?php echo $model['data_title']?></a></td>		
				<td><a href="
					<?php echo $this->createUrl('user/index',array('uid'=>$model['uid'])); ?>"><?php echo $model['username']?></a></td>	
				<td><?php echo date('Y-m-d H:i:s',$model['add_time'])?></td>		
				<td><?php echo $model['download_count']?></td>		
				<td><?php echo $model['focus_count']?></td>		
				<td><?php echo $model['comment_count']?></td>		
				<td><?php echo $model['view_count']?></td>			
				<td>
					<a href="<?php echo $this->createUrl('question/update',array('id'=>$model['id'])); ?>">编辑</a> &nbsp; / &nbsp;
					<a href="<?php echo $this->createUrl('question/delete',array('id'=>$model['id'])); ?>" class="text-error" onclick="return confirm('您确认要删除吗，删除之后将无法恢复?')">删除</a> 
				</td>
			</tr>
		<?php endforeach;?>
			<tr>
			<td colspan="10" style="text-align:center;">
				<?php 
                  //分页
                  $this->widget('CLinkPager', array(
						 'header'=>'',
						 'pages' => $pages,
					));
		 		 ?>
		 	</td>
			</tr>
		</tbody>
	</table>
</div>