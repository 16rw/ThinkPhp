<?php
return array(
	//'配置项'=>'配置值'
	'DEFAULT_MODULE'        =>  'Home',  // 默认模块
	//定义自己的分组列表
	'MODULE_ALLOW_LIST'     =>  array('Home','Admin'),
	//给页面底部设置跟踪trace信息 
	'SHOW_PAGE_TRACE'      => TRUE,


	 /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'web_com',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀


    'TMPL_L_DELIM'          =>  '{',            // 模板引擎普通标签开始标记
    'TMPL_R_DELIM'          =>  '}',            // 模板引擎普通标签结束标记
);