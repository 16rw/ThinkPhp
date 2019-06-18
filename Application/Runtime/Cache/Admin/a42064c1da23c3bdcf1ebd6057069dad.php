<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="/Public/Admin/bootstrap/css/bootstrap.min.css">
	<style>
		.table{ margin-top: 20px; }
		.control-label{ font-size: 24px; }
	</style>
</head>
<body>
<form role="form" action="" method="POST">
	<input type="hidden" name="role_id" value="<?php echo ($roleinfo["role_id"]); ?>">
	 <label for="name" class="col-sm-2 control-label">角色名称:</label><input class="form-control" placeholder="请输入角色名称" type="text" name="role_name">
	<table class="table" border="1">
		<?php if(is_array($authinfoA)): foreach($authinfoA as $key=>$v): ?><tr>
			<td>
				<input type="checkbox" name="auth_id[]" value="<?php echo ($v["auth_id"]); ?>"/>
				<?php echo ($v["auth_name"]); ?>
			</td>
			<td>
				<?php if(is_array($authinfoB)): foreach($authinfoB as $key=>$vv): if($vv['auth_pid'] == $v['auth_id']): ?><div style="width: 200px;float: left;"><input type="checkbox" name="auth_id[]" value="<?php echo ($vv["auth_id"]); ?>"/>
				<?php echo ($vv["auth_name"]); ?></div><?php endif; endforeach; endif; ?>
			</td>
		</tr><?php endforeach; endif; ?>
	</table>
	<div><input type="submit" style="margin-left:40%;" class="btn" value="添加角色"></div>
</form>
</body>
</html>