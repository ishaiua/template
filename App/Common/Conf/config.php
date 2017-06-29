<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'haiua',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'hh_',    // 数据库表前缀
    'URL_MODEL'             =>  1,     //URL访问模式,可选参数0、1、2、3
    
    'SHOW_PAGE_TRACE' =>true,

    'USER_AUTH_ON'=> true,      //是否需要认证
    'USER_AUTH_TYPE'=> 2 ,      //认证类型
    'USER_AUTH_KEY'=>'id'  ,     //认证识别号
    //'REQUIRE_AUTH_MODULE'=       //需要认证模块
    'NOT_AUTH_MODULE'=>'Login',        //无需认证模块
    'USER_AUTH_GATEWAY' =>'/Admin/Login/login' ,  //认证网关
    'RBAC_DB_DSN'  =>   array(
        'DB_TYPE'       =>  'mysql',      
        'DB_HOST'       =>  '127.0.0.1',  
        'DB_NAME'       =>  'haiua',           
        'DB_USER'       =>  'root',      
        'DB_PWD'        =>  'root',     
        'DB_PORT'       =>  '3306',       
        'DB_PREFIX'     =>  '',  
    ),    //数据库连接DSN
    'RBAC_ROLE_TABLE'=>'hh_role' ,     //角色表名称
    'RBAC_USER_TABLE' =>'hh_user',     //用户表名称
    'RBAC_ACCESS_TABLE'=>'hh_access' ,       //权限表名称
    'RBAC_NODE_TABLE' => 'hh_node' ,   //节点表名称
    'ADMIN_AUTH_KEY'    => 'supper_admin',
    /*超级管理员账号-如果修改超级管理员用户名,此处需要修改*/
    'ADMIN'             => 'admin',

    'URL_ROUTER_ON'         =>  false,   // 是否开启URL路由
    'URL_ROUTE_RULES'       =>  array(
            'admin'  =>'Admin/Login/login' 

            ), // 默认路由规则 针对模块
);