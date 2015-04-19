<!DOCTYPE HTML>
<html lang="zh">
<head>
	<meta charset="utf-8">
	<title>管理员登入</title>
	<style type="text/css">
	html {
		background-color: #E9EEF0
	}
	.wrapper {
		margin: 140px auto;
	}
	.loginBox {
		background-color: #FEFEFE;
		border: 1px solid #BfD6E1;
		border-radius: 5px;
		color: #444;
		font: 14px 'Microsoft YaHei','微软雅黑';
		margin: 0 auto;
		width: 388px
	}
	.loginBox .loginBoxCenter {
		border-bottom: 1px solid #DDE0E8;
		padding: 24px;
		padding-top:0;
	}
	.loginBox .loginBoxCenter p {
		margin-bottom: 10px
	}
	.loginBox .loginBoxButtons {
		background-color: #F0F4F6;
		border-top: 1px solid #FFF;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
		line-height: 28px;
		overflow: hidden;
		padding: 20px 24px;
		vertical-align: center;
	}
	.loginBox .loginInput {
		border: 1px solid #D2D9dC;
		border-radius: 2px;
		color: #444;
		font: 12px 'Microsoft YaHei','微软雅黑';
		padding: 8px 14px;
		margin-bottom: 8px;
		width: 310px;
	}
	.loginBox .loginInput:FOCUS {
		border: 1px solid #B7D4EA;
		box-shadow: 0 0 8px #B7D4EA;
	}
	.loginBox .loginBtn {
		background-image: -moz-linear-gradient(to bottom, #B5DEF2, #85CFEE);
		border: 1px solid #98CCE7;
		border-radius: 20px;
		box-shadow:inset rgba(255,255,255,0.6) 0 1px 1px, rgba(0,0,0,0.1) 0 1px 1px;
		color: rgb(233, 83, 25);
		cursor: pointer;
		float: right;
		font: bold 13px Arial;
		padding: 5px 14px;
	}
	.loginBox .loginBtn:HOVER {
		background-image: -moz-linear-gradient(to top, #B5DEF2, #85CFEE);
	}
	.loginBox a.forgetLink {
		color: #ABABAB;
		cursor: pointer;
		float: right;
		font: 11px/20px Arial;
		text-decoration: none;
		vertical-align: middle;
	}
	.loginBox a.forgetLink:HOVER {
		text-decoration: underline;
	}
	.loginBox input#remember {
		vertical-align: middle;
	}
	.loginBox label[for="remember"] {
		font: 11px Arial;
	}
	.errorMessage{
		color:red;
		font-size:12px;	
	}
	.head{
		width:100%;	
	}
	.head h3{
		padding:0;
		margin:0;
		height:30px;
		text-align:center;
		line-height:30px;
		padding-top:10px;
	}
	</style>
</head>
<body>
	<div class="wrapper">
		<?php 
			//begin form 
			$form=$this->beginWidget('CActiveForm',array(
					'action'=>$this->createUrl('public/checklogin'),
					'method'=>'post',
					'id'=>'login-form',
					'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'clientOptions'=>array(
							'validateOnSubmit'=>true,
					),
			))
		?>
		<div class="loginBox">
			<div class="head">
				<h3>管理员登入</h3>
			</div>
			<div class="loginBoxCenter">
				<p><?php echo $form->label($model,'username');?>:
				<?php echo $form->error($model,'username');?></p>
				<p><?php echo $form->textField($model,'username',array('class'=>'loginInput'));?></p>
				<p><?php echo $form->label($model,'password');?>:
				<?php echo $form->error($model,'password');?>
				</p>
				<p><?php echo $form->passwordField($model,'password',array('class'=>'loginInput'));?></p>
			</div>
			<div class="loginBoxButtons">		
				<input type="submit" class="loginBtn" name="sub" value="登入">
			</div>
		</div>
		<?php 
			//end form
			$this->endWidget(); 
		?>
	</div>
</body>
</html>