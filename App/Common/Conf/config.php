<?php

$b=include_once (dirname(__FILE__)."/database.php");
$a=array(
	
    'URL_MODEL'             =>  1, //URL访问模式,可选参数0、1、2、3
    
    'SHOW_PAGE_TRACE' =>false,

    'USER_AUTH_ON'=> true,      //是否需要认证
    'USER_AUTH_TYPE'=> 2 ,      //认证类型
    'USER_AUTH_KEY'=>'id',      //认证识别号
    //'REQUIRE_AUTH_MODULE'=       //需要认证模块
    'NOT_AUTH_MODULE'=>'Login',    //无需认证模块
    'USER_AUTH_GATEWAY' =>'/Admin/Login/login' ,  //认证网关
    'ADMIN_AUTH_KEY'    => 'supper_admin',
    /*超级管理员账号-如果修改超级管理员用户名,此处需要修改*/
    'ADMIN'             => 'admin',

    'URL_ROUTER_ON'         =>  false,   // 是否开启URL路由
    'URL_ROUTE_RULES'       =>  array(
            'admin'  =>'Admin/Login/login' 

            ), // 默认路由规则 针对模块
);

return array_merge($a,$b);