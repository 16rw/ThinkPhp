<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>客户后台管理界面</title>
<link rel="stylesheet" type="text/css" href="/Public/Admin/bootstrap/css/bootstrap.css"/>
<style type="text/css">
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
						商品列表
					</div>
					<div class="vv">
						<li><a class="btn btn-warning" href="<?php echo U('tianjia');?>">添加商品</a></li>
						<li>
							<form action="<?php echo U('Goods/goodsSearch');?>" method="POST">
								<input type="text" name="search">
								<input class="btn btn-warning" type="submit" value="查询商品">
							</form>
						</li>
						<li><input class="btn btn-warning" type="submit" value="批量处理"></li>
					</div>
				<div class="panel-body">
					<table class="table table-striped table-hover table-responsive">
						<thead>
							<tr>
								<th><input type="checkbox" onclick="SelectAll()">id</th>
								<th>商品名</th> 
								<th>价格</th>
								<th>数量</th>
								<th>图片</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
									<td><input type="checkbox" name="choose[]" value="<?php echo ($v["id"]); ?>"><?php echo ($v["goods_id"]); ?></td>
									<td><?php echo ($v["goods_name"]); ?></td>
									<td><?php echo ($v["goods_price"]); ?></td>
									<td><?php echo ($v["goods_num"]); ?></td>
									<td><img src="<?php echo (substr($v["goods_img"],1)); ?>" alt="" width="80" height="80"></td>
									<td>
										<a class="btn btn-danger" href="<?php echo U('del',array('goods_id'=>$v['goods_id']));?>">删除</a> 
										<a class="btn btn-info" href="<?php echo U('upd',array('goods_id'=>$v['goods_id']));?>">修改</a>
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