<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>用户注册</title>
	<!-- <link rel="stylesheet" href="/tp3/Public/Admin/left/css/index.css"> -->
	<style>
	html,body{ 
		height: 100%;
		overflow: hidden;
		font-family: '微软雅黑';
	 }
	 body{
	 	background-color:#fbfbfb; 
	 	margin: 0;
		padding: 0;
		display: flex;
		justify-content: center;
		align-items: center;
	 }
	 ul{
	 	margin: 0;
	 	padding: 50px;
	 	padding-top: 0px;
	 	list-style: none;
	 }
	 .register{
		width:800px;
		background-color:#f9f9f9;
		border: 1px solid #ccc;
		border-radius:5px;
	 }
	 li{
	 	display: flex;
	 	margin: 20px 0;
	 }
	 label,input{
	 	display: block;
	 	float: left;
	 	height: 46px;
	 	font-size: 24px;
	 	box-sizing: border-box;
	 	color: #333;
	 }
	 label{
	 	width: 200px;
	 	line-height: 46px;
	 	margin-right: 30px;
	 	text-align: right;
	 }
	 input{
	 	width: 320px;
	 	padding: 8px;
	 	line-height: 1;
	 	outline: none;
	 	position: relative;;
	 }
	 input.code{
	 	width: 120px;
	 }
	 input.verify{
	 	width: 190px;
	 	/*margin-left: 10px;*/

	 }
	 img{ width: 138px; }
	 input.disabled{
	 	background-color: #ccc !important;
	 	cursor: not-allowed !important;
	 }
	 input[type=submit]{
	 	border:none;
	 	color: #fff;
	 	background-color: #e64145;
	 	border-radius: 4px;
	 	cursor: pointer;
	 }
	 .tips{
	 	width: 100%;
	 	height:40px;
	 	text-align: center;
	 }
	 .tips p{
	 	min-width:300px;
	 	max-width: 400px;
	 	line-height: 40px;
	 	margin: 0 auto;
	 	color:#fff;
	 	display: none;
	 	background-color: #C91623; 
	 }
	 .submit:disabled{
	 	background-color:gray;
	 	cursor: not-allowed; 
	 }
	 span{
	 	line-height: 46px;
	 	padding-left:20px;
	 	font-size: 20px;
	 	color: yellowgreen;
	 	text-shadow: 0 0 20px yellowgreen; 
	 }
	 }

	</style>
</head>
<body>
<div class="login">
	<div class="tips">
		<p><?php echo ((isset($err) && ($err !== ""))?($err):"&nbsp;"); ?></p>
	</div>
	<form action="" method="POST" id="ajaxForm">
		<ul>
			<li>
				<label for="">用户名</label>
				<input  class="name" type="text" name="username" />
			</li>
			<li>
				<label for="">密码</label>
				<input class="password" type="password" name="password" />
			</li>
			<li>
				<label for="">验证码</label>
				<input class="verify" maxlength="4" type="text" name="verify" onclick="JavaScript:this.value=''" />
				<img src="/tp3/index.php/Admin/Manager/verifyImg" onclick="this.src='/tp3/index.php/Admin/Manager/verifyImg/'+Math.random()" alt="">
			</li>
			<li>
				<label for=""></label>
				<input class="submit" type="submit" value="登录"/>
			</li>
		</ul>
		

	</form>

</div>
<script src="/tp3/Public/Admin/bootstrap/js/jquery-2.1.4.min.js"></script>
<script>
// $(function(){
// 	$(".submit").click(function(){
// 		$.ajax({
// 			url:'/tp3/index.php/Admin/Manager/adminLogin',
// 			type:'POST',
// 			data:{
// 				username:$('.name').val(),
// 				password:$('.password').val()
// 			},
// 			success:function(data){
// 				console.log(data);
// 				if(data){
// 					 $(location).attr('href', "<?php echo U('Admin/Index/boot');?>");
// 				}else{
// 					$('.tips').html("用户名或密码错误").fadeIn().delay(2000).fadeOut()
// 				}
				
// 			}
// 		});

// 	});
	// $(".submit").click(function(){
	// 	$ajax({
	// 		url:'/tp3/index.php/Admin/Manager/adminLogin',
	// 		type:'POST',
	// 		data:{
	// 			username:$('.inputName').val(),
	// 			password:$().val()
	// 		},
	// 		success:function(data){
	// 			$('.tips').html().fadeIn().delay(2000).fadeOut()
	// 		}

	// 	});

	// });


//});

</script>
</body>
</html>