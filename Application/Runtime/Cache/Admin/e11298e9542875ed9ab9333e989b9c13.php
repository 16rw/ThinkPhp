<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>权限添加</title>
	<link rel="stylesheet" href="/Public/Admin/left/css/index.css">
	
</head>
<body>
<div class="register">
	<div class="tips">
		<p><?php echo ((isset($err) && ($err !== ""))?($err):"&nbsp;"); ?></p>
	</div>
	<form action=""  method="POST" id="ajaxForm">
		<ul>
			<li>
				<label for="">权限名称</label>
				<input  class="name" type="text" name="auth_name" value="" />
			</li>
			<li>
				<label for="">权限上级</label>
				<select name="auth_pid" id="">
					<option value="0">-请选择-</option>
					<?php if(is_array($authinfoA)): foreach($authinfoA as $key=>$v): ?><option value="<?php echo ($v["auth_id"]); ?>"><?php echo ($v["auth_name"]); ?></option><?php endforeach; endif; ?>
				</select>
			</li>
			<li>
				<label for="">控制器</label>
				<input class="confirm"  type="text" name="auth_c"  value="" />
			</li>
			<li>
				<label for="">操作方法</label>
				<input class="confirm"  type="text" name="auth_a"  value="" />
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