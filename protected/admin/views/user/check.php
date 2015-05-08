<div class="condition alert alert-info">
	<?php $form = $this->beginWidget('CActiveForm', array(
	    'id'=>'condition-form',
	    'enableAjaxValidation'=>true,
	    'enableClientValidation'=>true,
	    'htmlOptions'=>array('class'=>'form-horizontal'),
	)); ?>
	搜索关键字:<input type="text" name="content"/>	
	<input type="submit" value="查询" class="btn btn-info">
	<span class="text-error">共有 <?php echo $count; ?>个用户</span>
	<?php $this->endWidget(); ?>

</div>
<div class="content">
	<table class="table table-condensed table-bordered">
		<thead>
			<tr>
				<th>UID</th>
				<th>用户名</th>
				<th>状态</th>
				<th>申请时间</th>
				<th>申请理由</th>				
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
					<?php echo $model['username'] ?>
				</td>	
				<td>
					<?php echo $model['result'] ?>
				</td>	
				<td>
					<?php echo date('Y-m-d H:i:s',$model['time'])?>
				</td>	
				<td>
					<?php echo $model['remark'] ?>
				</td>	
				<td>
					<a class="text-success" onclick="return confirm('您确认要通过吗? ');" href="<?php echo $this->createUrl('checkOk',array('uid'=>$model['uid'],'id'=>$model['id'])) ?>">通过</a>
						&nbsp;/&nbsp;
					<a class="text-error" onclick="return confirm('您确认要拒绝吗? ');" href="<?php echo $this->createUrl('checkRej',array('uid'=>$model['uid'],'id'=>$model['id'])) ?>">拒绝</a>
				</td>			
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>