<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="/Public/Admin/bootstrap/css/bootstrap.min.css">
	<style>
		span{ font-family: 微软雅黑; font-size:24px; }
		.table{ margin-top: 20px; }
	</style>
</head>
<body>
<form action="" method="POST">
	<input type="hidden" name="role_id" value="<?php echo ($roleinfo["role_id"]); ?>">
	<span>【<?php echo ($roleinfo["role_name"]); ?>】</span>
	<table class="table" border="1">

		<tr>
			<th>一级名称</th>
			<th>二级名称</th>
		</tr>
		<?php if(is_array($authinfoA)): foreach($authinfoA as $key=>$v): ?><tr>
			<td>
				<input type="checkbox" name="auth_id[]" value="<?php echo ($v["auth_id"]); ?>"
				<?php if(in_array(($v["auth_id"]), is_array($roleinfo["role_auth_ids"])?$roleinfo["role_auth_ids"]:explode(',',$roleinfo["role_auth_ids"]))): ?>checked='checked'<?php endif; ?>
				/>
				<?php echo ($v["auth_name"]); ?>
			</td>
			<td>
				<?php if(is_array($authinfoB)): foreach($authinfoB as $key=>$vv): if($vv['auth_pid'] == $v['auth_id']): ?><div style="width: 200px;float: left;"><input type="checkbox" name="auth_id[]" value="<?php echo ($vv["auth_id"]); ?>"
				<?php if(in_array(($vv["auth_id"]), is_array($roleinfo["role_auth_ids"])?$roleinfo["role_auth_ids"]:explode(',',$roleinfo["role_auth_ids"]))): ?>checked='checked'<?php endif; ?>
				/>
				<?php echo ($vv["auth_name"]); ?></div><?php endif; endforeach; endif; ?>
			</td>
		</tr><?php endforeach; endif; ?>
	</table>
	<div><input style="margin-left:40%;" class="btn" type="submit" value="分配权限"></div>
</form>
</body>
</html>