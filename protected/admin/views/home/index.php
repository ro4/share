<div class="condition alert alert-info">
	<span class="text-error">共有 <?php echo $count; ?>个用户</span>
</div>
<div class="content">
	<table class="table table-condensed table-bordered">
		<thead>
			<tr>
				<th>UID</th>
				<th>用户名</th>
				<th>添加时间</th>
				<th>分享数</th>
				<th>分享状态</th>				
				<th>状态</th>	
				<th>排序</th>
				<th>操作</th>				
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($models as $model):
			 ?>
			<tr>
				<td>
					<?php echo $model['uid'] ?>
				</td>
				<td>
					<img src="<?php echo $model['avatar_file'] ?>" style="width:30px;">
					<?php echo $model['username'] ?>
				</td>	
				<td>
					<?php echo date('Y-m-d H:i:s',$model['add_time']); ?>
				</td>	
				<td>
					<?php echo $this->getDataCount($model['uid']); ?>
				</td>	
				<td>
					<?php echo $model['authority'] ?>
				</td>	
				<td>
					<?php echo $model['state'] ?>
				</td>
				<td>
					<?php echo $model['sort'] ?>
				</td>
				<td>
					<a href="<?php echo $this->createUrl('update',array('uid'=>$model['uid'])) ?>">编辑</a> 
						&nbsp;/&nbsp;
					<a class="text-error" onclick="return confirm('您确认要删除吗? 删除之后将无法恢复！');" href="<?php echo $this->createUrl('delete',array('uid'=>$model['uid'])) ?>">删除</a>
				</td>			
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>