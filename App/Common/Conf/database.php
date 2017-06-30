<?php

return [
	//'配置项'=>'配置值'
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'haiua',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'hh_',    // 数据库表前缀
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
    'RBAC_USER_TABLE' =>'hh_role_user',     //用户表名称
    'RBAC_ACCESS_TABLE'=>'hh_access' ,       //权限表名称
    'RBAC_NODE_TABLE' => 'hh_node' ,   //节点表名称
];