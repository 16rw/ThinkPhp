<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>客户后台管理界面</title>
<link rel="stylesheet" type="text/css" href="/Public/Admin/bootstrap/css/bootstrap.css"/>
<style type="text/css">

/*媒体查询，小屏幕（平板，大于等于768px）*/


.vv{ height: 60px;color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px; }
.vv li{list-style: none; float: left; margin-left: 10px;}
.pagelist{ margin-left: 420px;   }
</style>
</head>
<body>



<!--右边主要区域 -->

<div class="page-right">
	
	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						用户列表
					</div>
					<div class="vv">
						<li><a class="btn btn-warning" href="<?php echo U('userAdd');?>">添加客户</a></li>
						<li>
							<form action="<?php echo U('User/userSearch');?>" method="POST">
								<input type="text" name="search">
								<input class="btn btn-warning" type="submit" value="查询客户">
							</form>
						</li>
						<li><input class="btn btn-warning" type="submit" value="批量处理"></li>
					</div>
				<div class="panel-body">
					<table class="table table-striped table-hover table-responsive">
						<thead>
							<tr>
								<th><input type="checkbox" onclick="SelectAll()">id</th>
								<th>用户名</th> 
								<th>密码</th>
								<th>年龄</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
									<td><input type="checkbox" name="choose[]" value="<?php echo ($v["id"]); ?>"><?php echo ($v["id"]); ?></td>
									<td><?php echo ($v["username"]); ?></td>
									<td><?php echo ($v["password"]); ?></td>
									<td><?php echo ($v["age"]); ?></td>
									<td>
										<a class="btn btn-danger" href="/index.php/Admin/User/del/id/<?php echo ($v["id"]); ?>">删除</a> 
										<a class="btn btn-info" href="<?php echo U('update',array('id'=>$v['id']));?>">修改</a>
									</td>
								</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<div class="pagelist"><?php echo ($pagelist); ?></div>	
</div>
<script type="text/javascript" src="/Public/Admin/bootstrap/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
<script>
	function SelectAll() {
	 var checkboxs=document.getElementsByName("choose[]");
	 for (var i=0;i<checkboxs.length;i++) {
	  var e=checkboxs[i];
	  e.checked=!e.checked;
	 }
	}
</script>
</body>
</html>