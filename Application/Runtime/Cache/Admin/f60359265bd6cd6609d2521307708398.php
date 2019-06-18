<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>用户注册</title>
	<link rel="stylesheet" href="/Public/Admin/left/css/index.css">
	
</head>
<body>
<div class="register">
	<div class="tips">
		<p><?php echo ((isset($err) && ($err !== ""))?($err):"&nbsp;"); ?></p>
	</div>
	<form action=""  method="POST" enctype="multipart/form-data" id="ajaxForm">
		<ul>
			<li>
				<label for="">商品名称</label>
				<input  class="name" type="text" name="goods_name" value="" />
			</li>
			<li>
				<label for="">商品价格</label>
				<input class="password" type="text" name="goods_price" value=""  />
			</li>
			<li>
				<label for="">商品数量</label>
				<input class="confirm"  type="text" name="goods_num"  value="" />
			</li>
			<li>
				<label for="">商品图片</label>
				<input class="confirm"  type="file" name="goods_img"  value="" />
			</li>
			<li>
				<label for=""></label>
				<input class="submit" type="submit" value="立即添加"/>
			</li>
		</ul>
	</form>

</div>
</body>
</html>