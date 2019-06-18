<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="/Public/Admin/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="/Public/Admin/left/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
		$(".div2").click(function(){ 
			$(this).next("div").slideToggle("slow")  
			.siblings(".div3:visible").slideUp("slow");
		});
	});
</script>
<style>
body{ margin:0; padding: 0; font-family:微软雅黑;}
.left{ width:200px; height:100%; border-right:1px solid #CCCCCC ; color:#000000; font-size:14px; text-align:center;}
.div1{text-align:center; width:200px; }
.div2{height:40px; line-height:40px;cursor: pointer; background-color: #f6f6f6; font-size:20px; position:relative;border-bottom:#ccc 1px dotted;}
.div3{display: none;cursor:pointer; font-size:16px;}
.div3 ul{margin:0;padding:0;}
.div3 li{ height:40px; line-height:40px; list-style:none; border-bottom:#ccc 1px dotted; text-align:center;}
</style>
</head>
<body>
<div class="left">
<div class="div1">
    <?php if(is_array($authinfoA)): foreach($authinfoA as $key=>$v): ?><div class="div2"><?php echo ($v["auth_name"]); ?></div>
      <div class="div3">
        <ul>
            <?php if(is_array($authinfoB)): foreach($authinfoB as $key=>$vv): if($vv['auth_pid'] == $v['auth_id']): ?><li><a href="/index.php/Admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>" target="rightFrame"><?php echo ($vv["auth_name"]); ?></a></li><?php endif; endforeach; endif; ?>
        </ul>
     </div><?php endforeach; endif; ?>
</div>
</div>
</body>
</html>