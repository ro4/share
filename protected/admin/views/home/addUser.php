<div class="content">
<?php 
	$this->beginWidget('CActiveForm',array(
				'action'=>$this->createUrl('adduser'),
				'id'=>'add-form',
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),  
			));
 ?>
	<table class="table table-bordered" id="update">
		<tbody>
			<tr>
				<th>uid</th>
				<td>
					<input type="text"  name="uid"> 				
				</td>			
			</tr>
			<tr>
				<th>状态</th>
				<td>
					<select name="state">
						<option value="0" >启用</option>
						<option value="1" >禁用</option>								
					</select>		
				</td>			
			</tr>
			<tr>
				<th>排序</th>
				<td>
                    	<input type="text" name="sort">
				</td>			
			</tr>
			<tr>
				<th></th>
				<td>
					<input type="submit" value="添加" class="btn btn-primary">
					<input onclick="javascript:window.history.back(-1)" type="button" value="返回" class="btn">
				</td>
			</tr>
		</tbody>
	</table>
	<?php 
		$this->endWidget();
	 ?>
</div>
