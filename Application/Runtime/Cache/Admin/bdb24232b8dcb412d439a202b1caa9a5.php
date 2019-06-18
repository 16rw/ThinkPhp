<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/Public/Admin/bootstrap/css/bootstrap.css"/>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
	<div class="navbar-header">
		<a href="#" class="navbar-brand">客户后台管理</a>
		<button class="navbar-toggle" data-toggle="collapse" data-target="#login">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<ul class="nav navbar-nav navbar-right navbar-collapse collapse" id="login" style="margin:0px 20px 0px 0px;">
		<li><a href="#"><span class="badge"><?php echo (session('admin_name')); ?>用户</span></a></li>
		<li><a href="<?php echo U('Manager/adminLogin');?>" target="_parent"><span class="badge">登陆</span></a></li>
		<li><a href="<?php echo U('Manager/adminExit');?>" target="_top" onclick="if(!confirm('确认要退出系统么?')){return false;}">退出</a></li>
		<li><a href="<?php echo U('Manager/adminRegister');?>" target="_parent">注册</a></li>
	</ul>
</nav>

<script type="text/javascript" src="/Public/Admin/bootstrap/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/Public/Admin/bootstrap/js/bootstrap.min.js"></script>	
</body>
</html>