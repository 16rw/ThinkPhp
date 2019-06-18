<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>用户注册</title>
	<link rel="stylesheet" href="/Public/Admin/left/css/index.css">
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
	<form action="" method="POST" id="ajaxForm">
		<ul>
			<li>
				<label for="">用户名</label>
				<input  class="name" type="text" name="name" />
			</li>
			<li>
				<label for="">设置密码</label>
				<input class="password" type="password" name="password" />
			</li>
			<li>
				<label for="">确认密码</label>
				<input class="confirm"  type="password" name="confirm" />
			</li>
			<li>
				<label for="">角色</label>
				<select name="rid">	
                    <option value="0">请选择角色</option>
                    <?php if(is_array($roleinfo)): foreach($roleinfo as $key=>$v): ?><option value="<?php echo ($v["role_id"]); ?>"><?php echo ($v["role_name"]); ?></option><?php endforeach; endif; ?>
                </select>
				
			</li>
			<li>
				<label for=""></label>
				<input class="submit" type="submit" value="立即注册"/>
			</li>
		</ul>
		

	</form>

</div>
</body>
</html>