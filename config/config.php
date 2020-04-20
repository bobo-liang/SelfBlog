<?php
	//配置文件
return array(
	//数据库配置
    'database'=> array(
        'type' => 'mysql',		//数据库产品
    	'host' => 'localhost',
        'port' => '3306',
        'user' => 'root',
        'pass' => '666666',
        'charset' => 'utf8',
        'dbname'  => 'szxjy',
        'prefix'  => ''			//表前缀
    ),
	//驱动信息
	'drivers' =>array(),

	//其他配置
	'system'=>array(
		'error_reporting' => E_ALL,//错误级别控制，默认显示所有错误
		'display_errors' => 1,	//错误显示控制，1表示显示错误，0表示隐藏错误

		),
);