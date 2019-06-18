<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>登录界面</title>
<link href="/Public/Admin/wopop/style_log.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/wopop/style.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/wopop/userpanel.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/wopop/jquery.ui.all.css">

</head>

<body class="login" mycollectionplug="bind">
<div class="login_m">
<div class="login_logo"><img src="/Public/Admin/wopop/logo.png" width="196" height="46"></div>
<div class="login_boder">

<div class="login_padding" id="login_model">
	<form action="<?php echo U('index');?>" method="POST">
	  <h2>用户名</h2>
	  <label>
	    <input type="text" name="username" class="txt_input txt_input2"  >
	  </label>
	  <h2>密码</h2>
	  <label>
	    <input type="password" name="password"  class="txt_input" >
	  </label>
	  <p class="forgot"><a id="iforget" href="javascript:void(0);">忘记密码?</a></p>
	  <div class="rem_sub">
	  <div class="rem_sub_l">
	  <input type="checkbox" name="checkbox" id="save_me">
	   <label for="checkbox">记住密码</label>
	   </div>
	    <label>
	      <input type="submit" class="sub_button" value="登录" style="opacity: 0.7;">
	    </label>
	  </div>
	</form>  
</div>

</div>
</div>
</body>
</html>