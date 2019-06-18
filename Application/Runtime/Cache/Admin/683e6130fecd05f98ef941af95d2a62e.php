<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>权限添加</title>
	<style>
	 html,body{ 
		height: 100%;
		overflow: hidden;
		font-family: '微软雅黑';
	 }
	 body{
	 	background-color:#369; 
	 	margin: 0;
		padding: 0;
		display: flex;
		justify-content: center;
		align-items: center;
	 }
	 ul{
	 	margin: 0;
	 	padding: 50px;
	 	padding-top: 0px;
	 	list-style: none;
	 }
	 .register{
		width:800px;
		background-color:#f9f9f9;
		border: 1px solid #ccc;
		border-radius:5px;
	 }
	 li{
	 	display: flex;
	 	margin: 20px 0;
	 }
	 label,input{
	 	display: block;
	 	float: left;
	 	height: 46px;
	 	font-size: 24px;
	 	box-sizing: border-box;
	 	color: #333;
	 }
	 label{
	 	width: 200px;
	 	line-height: 46px;
	 	margin-right: 30px;
	 	text-align: right;
	 }
	 input{
	 	width: 320px;
	 	padding: 8px;
	 	line-height: 1;
	 	outline: none;
	 	position: relative;;
	 }
	 input.code{
	 	width: 120px;
	 }
	 input.verify{
	 	width: 190px;
	 	margin-left: 10px;

	 }
	 input.disabled{
	 	background-color: #ccc !important;
	 	cursor: not-allowed !important;
	 }
	 input[type=submit]{
	 	border:none;
	 	color: #fff;
	 	background-color: #e64145;
	 	border-radius: 4px;
	 	cursor: pointer;
	 }
	 .tips{
	 	width: 100%;
	 	height:40px;
	 	text-align: center;
	 }
	 .tips p{
	 	min-width:300px;
	 	max-width: 400px;
	 	line-height: 40px;
	 	margin: 0 auto;
	 	color:#fff;
	 	display: none;
	 	background-color: #C91623; 
	 }
	 .submit:disabled{
	 	background-color:gray;
	 	cursor: not-allowed; 
	 }
	 span{
	 	line-height: 46px;
	 	padding-left:20px;
	 	font-size: 20px;
	 	color: yellowgreen;
	 	text-shadow: 0 0 20px yellowgreen; 
	 }
	 }
	</style>
</head>
<body>
<div class="register">
	<div class="tips">
		<p><?php echo ((isset($err) && ($err !== ""))?($err):"&nbsp;"); ?></p>
	</div>
	<form action=""  method="POST" id="ajaxForm">
	<input type="hidden" name="auth_id" value="<?php echo ($info["auth_id"]); ?>">
		<ul>
			<li>
				<label for="">权限名称</label>
				<input  class="name" type="text" name="auth_name" value="<?php echo ($info["auth_name"]); ?>" />
			</li>
			<li>
				<label for="">权限上级</label>
				<input class="confirm"  type="text" name="auth_pid"  value="<?php echo ($info["auth_pid"]); ?>" />
			</li>
			<li>
				<label for="">控制器</label>
				<input class="confirm"  type="text" name="auth_c"  value="<?php echo ($info["auth_c"]); ?>" />
			</li>
			<li>
				<label for="">操作方法</label>
				<input class="confirm"  type="text" name="auth_a"  value="<?php echo ($info["auth_a"]); ?>" />
			</li>
			<li>
				<label for=""></label>
				<input class="submit" type="submit" value="立即修改"/>
			</li>
		</ul>
	</form>

</div>
</body>
</html>