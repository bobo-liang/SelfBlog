<?php
//增加命名空间
namespace core;
//确认访问正确
if(!defined('ACCESS')){
    //没有定义ACCESS常量：非正常访问
    header('location:../public/index.php');
    exit;
}

//初始化类
class App{
//入口方法
	public  static function start(){
	
		//目录常量设置
		self::set_path();
		//配置文件
		self::set_config();
		//错误处理
		self::set_error();
		//解析URL
		self::set_url();
		//自动加载
		self::set_autoload();
		//分发控制器
		self::set_dispatch();




	}
//设置目录常量
private static function set_path(){
    //定义不同路径常量：核心目录、App目录、控制器目录、模型目录、视图目录、扩展目录
    define('CORE_PATH',		ROOT_PATH . 'core/');
    define('APP_PATH',		ROOT_PATH . 'app/');
    define('HOME_PATH',		APP_PATH . 'home/');
    define('ADMIN_PATH',	APP_PATH . 'admin/');
    define('ADMIN_CONT',	ADMIN_PATH . 'controller/');
    define('ADMIN_MODEL',	ADMIN_PATH . 'model/');
    define('ADMIN_VIEW',	ADMIN_PATH . 'view/');			
    define('HOME_CONT',		HOME_PATH . 'controller/');
    define('HOME_MODEL',	HOME_PATH . 'model/');
    define('HOME_VIEW',		HOME_PATH . 'view/');
    define('VENDOR_PATH',	ROOT_PATH . 'vendor/');
    define('CONFIG_PATH',	ROOT_PATH . 'config/');
    define('URL','http://www.selfblog.com/');			
	}

//增加错误控制方法
private static function set_error(){
	//拿配置文件读取的全局变量
	global $config;
	//var_dump($config);
    //错误类型和错误处理方式
   // @ini_set('error_reporting',$global['system']['error_reporting']');	//E_ALL为系统常量，表示所有错误
	    @ini_set('error_reporting',$global['system']['error_reporting']);	//E_ALL为系统常量，表示所有错误
		@ini_set('displary_errors',$global['system']['displary_errors']);	//显示错误信息

	}
//增加配置文件
private static function set_config(){
	global $config;
	//包含配置文件
	$config = include CONFIG_PATH . 'config.php';
	}
//解析URL
private static function set_url(){
    //获取前后台、控制器名字和方法名字：规定浏览器参数中携带p参数、c参数和a参数（p代表platform平台，c代表controller，a代表action）
    $p = $_REQUEST['p'] ?? 'home';			//默认前台
    $c = $_REQUEST['c'] ?? 'Index';			//默认IndexController
    $a = $_REQUEST['a'] ?? 'index';			//默认index方法
    
    //暂时只是解析，不分发，考虑到后续还要使用，设定为常量
    define('P',$p);
    define('C',$c);
    define('A',$a);
	//echo P,C,A;
}
//自动加载方法（自定义方法）
private static function set_autoload_function($class){
	//$class 代表内存中不存在的类（如果项目中有命名空间，那么此时带着空间路径）/home/controller/Indexcontroller
	//$取出类名
	$class = basename($class);

	//判定文件夹是否存在
	$core_file = CORE_PATH . $class . '.php';
	if(file_exists($core_file)) include $core_file;
	//判定控制器是否存在：包括前后台的
	$cont_file  = APP_PATH . P . '/controller/' . $class . '.php';
	if(file_exists($cont_file)) include $cont_file;

	//判定模型是否存在
	$model_file  = APP_PATH . P.'/model/' . $class . '.php';
	if(file_exists($model_file)) include $model_file;

	//插件加载
	$vendor_file = VENDOR_PATH . $class . '.php';
	if(file_exists($vendor_file)) include $vendor_file;


}
//注册自动加载
private static function set_autoload(){
//利用set_autoload_register进行注册
	spl_autoload_register(array(__CLASS__,'set_autoload_function'));

	}
	//分发控制器
private static function set_dispatch(){
	//找到前后台控制器方法
	$p = P;
	$c = C;
	$a = A;
	//组织成合适的空间元素
	$controller = "\\$p\\controller\\{$c}Controller";

	//echo $controller;
	$c = new $controller();//已经拿到对象，调用对象
	//调用对象：最终分发
	$c ->$a();  //可变方法

}

}