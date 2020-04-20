<?php
//增加入口记号：定义常量，以后其他文件判定是否有该常量
define('ACCESS',TRUE);	

//定义上级目录常量
define('ROOT_PATH',str_replace('\\','/',dirname(__DIR__)).'/');
//加载初始化文件
include ROOT_PATH.'core/App.php';
//激活初始化
\core\App::start();