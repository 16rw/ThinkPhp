<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="POST">
	角色名：<input type="text" name="role_name" value="<?php echo ($roleinfo["role_name"]); ?>">
	<table>
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
	<div><input type="submit" value="修改权限"></div>
</form>
</body>
</html>