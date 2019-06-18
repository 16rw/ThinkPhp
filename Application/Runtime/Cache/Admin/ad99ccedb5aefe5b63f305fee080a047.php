<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>用户注册</title>
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
		<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">	
		<ul>
			<li>
				<label for="">用户名</label>
				<input  class="name" type="text" name="username" value="<?php echo ($info["username"]); ?>" />
			</li>
			<li>
				<label for="">密码</label>
				<input class="password" type="text" name="password" value="<?php echo ($info["password"]); ?>"  />
			</li>
			<li>
				<label for="">年龄</label>
				<input class="confirm"  type="text" name="age"  value="<?php echo ($info["age"]); ?>" />
			</li>
			<li>
				<label for="">角色</label>
				<select name="rid" >
                    <option value="0">请选择角色</option>
                    <option value="1">尊贵客户</option>
                    <option value="2">普通客户</option>
                    <option value="3">超级管理员</option>
                </select>
				
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