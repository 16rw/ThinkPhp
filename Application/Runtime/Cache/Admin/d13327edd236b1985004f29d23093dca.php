<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>客户后台管理界面</title>
<link rel="stylesheet" type="text/css" href="/Public/Admin/bootstrap/css/bootstrap.css"/>
<style type="text/css">

/*媒体查询，小屏幕（平板，大于等于768px）*/

@media (min-width:768px){
	#leftbar{
		width:240px;
		margin:55px 0px 0px 0px;
		position:absolute;
		/*z-index:1;*/
		height:500px;
		/*background:#B9DEF0;*/
	}
	.page-right{
		background:#ddd;
		margin:-5px 0px 0px 245px;
	}
}
/* */
.left-dh{
	margin: 10px 0px;
}
@media (max-width:768px){
	body{
		background:#777;
	}
}
</style>
</head>
<body>
<!-- .navbar-static-top 去掉了由 .navbar-default 设置的左、右和顶部的边框，让它看起来更适合放在页面的头部。-->
<nav class="navbar navbar-default navbar-static-top">
	<div class="navbar-header">
		<a href="#" class="navbar-brand">客户后台管理</a>
		<button class="navbar-toggle" data-toggle="collapse" data-target="#login">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<button class="navbar-toggle" data-toggle="collapse" data-target="#leftbar">
			<span>设置</span>
		</button>
	</div>

	<ul class="nav navbar-nav navbar-right navbar-collapse collapse" id="login" style="margin:0px 20px 0px 0px;">
		<li><a href="#"><span class="badge"><?php echo (session('admin_name')); ?>用户</span></a></li>
		<li><a href="<?php echo U('Manager/adminLogin');?>"><span class="badge">登陆</span></a></li>
		<li><a href="<?php echo U('Manager/adminExit');?>" onclick="if(!confirm('确认要退出系统么?')){return false;}">退出</a></li>
		<li><a href="<?php echo U('Manager/adminRegister');?>">注册</a></li>
	</ul>

	<!--侧边栏 -->
	<div class="navbar-collapse collapse" id="leftbar">
		<ul class="nav" id="mz">
			<li>
				<div class="input-group left-dh">
					<input type="text" class="form-control">
					<span class="input-group-btn">
						<button class="btn btn-danger">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</sapn>
				</div>
			</li>
			<?php if(is_array($authinfoA)): foreach($authinfoA as $key=>$v): ?><li class="panel panel-default">
				<a href="#sys" data-toggle="collapse" data-parent="#mz"><?php echo ($v["auth_name"]); ?><span class="glyphicon glyphicon-chevron-right pull-right"></span></a>
				<ul class="panel-collapse collapse nav" id="sys">
					<?php if(is_array($authinfoB)): foreach($authinfoB as $key=>$vv): if($vv['auth_pid'] == $v['auth_id']): ?><li><a href="#"><?php echo ($vv["auth_name"]); ?></a></li><?php endif; endforeach; endif; ?>
					<!-- <li><a href="<?php echo U('Goods/showlist');?>">商品列表</a></li>
					<li><a href="<?php echo U('User/userList');?>">客户管理</a></li> -->
					<li><a href="#">退出</a></li>
				</ul>
			</li><?php endforeach; endif; ?>
			<!-- <li class="panel panel-default">
				<a href="#lanmu" data-toggle="collapse" data-parent="#mz">栏目功能<span class="glyphicon glyphicon-chevron-right pull-right"></span></a>
				<ul class="panel-collapse collapse nav" id="lanmu">
					<li><a href="#">栏目管理</a></li>
					<li><a href="#">栏目修改</a></li>
					<li><a href="#">退出</a></li>
				</ul>
			</li> -->
		</ul>
	</div>
</nav>

<!--右边主要区域 -->

<div class="page-right">
	<ol class="breadcrumb">
		<li><a href="#">首页管理</a></li>
		<li><a href="#">栏目</a></li>
		<li><a href="#">增加栏目</a></li>
	</ol>
	<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						用户列表
					</div>
				<div class="panel-body">
					<table class="table table-striped table-hover table-responsive">
						<thead>
							<tr>
								<th>id</th>
								<th>用户名</th> 
								<th>密码</th>
								<th>年龄</th>
								<th>创建时间</th>
								<th>状态</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
									<td><?php echo ($v["id"]); ?></td>
									<td><?php echo ($v["adminname"]); ?></td>
									<td><?php echo ($v["age"]); ?></td>
									<td><?php echo ($v["admintime"]); ?></td>
									<td>出库</td>
								</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					订单1
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover table-responsive">
						<thead>
							<tr>
								<th>id</th>
								<th>订单号</th> 
								<th>订单日期</th>
								<th>总价</th>
								<th>状态</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>01</td>
								<td>2017-1-3 7:10:30</td>
								<td>177.0</td>
								<td>出库</td>
							</tr>
							<tr>
								<td>2</td>
								<td>02</td>
								<td>2017-8-1 21:01:10</td>
								<td>1700</td>
								<td>出库</td>
							</tr>
							<tr>
								<td>3</td>
								<td>03</td>
								<td>2017-10-2 20:12:11</td>
								<td>2450</td>
								<td>未确认</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				订单2
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover table-responsive">
					<thead>
						<tr>
							<th>id</th><th>订单号</th><th>订单日期</th><th>总价</th><th>状态</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<td>1</td><td>01</td><td>2017-1-3 7:10:30</td><td>177.0</td><td>出库</td>
						</tr>
						<tr>
						<td>2</td><td>02</td><td>2017-11-5 21:01:10</td><td>1899</td><td>出库</td>
						</tr>
						<tr>
						<td>3</td><td>03</td><td>2017-12-5 20:12:11</td><td>3500</td><td>未确认</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
	<ul class="pagination pull-right">
		<li><a href="#">&laquo;</a></li>
		<li><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">5</a></li>
		<li><a href="#">&raquo;</a></li>
	</ul>
</div>
<script type="text/javascript" src="/Public/Admin/bootstrap/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>