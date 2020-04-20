<?php
//命名空间
namespace core;
class Controller{
	//增加属性;保存对象：为了类能够调用和访问（自己跨方法）
	protected $smarty;

	//构造方法：实现一些需要初始化才能使用的内容
	public function __construct(){
	//1、实现smarty的初始化
	//加载Smarty

	include VENDOR_PATH . 'smarty/Smarty.class.php';

	//实例化
	$this->smarty = new \Smarty();

	//设置Smarty
	$this->smarty->template_dir = APP_PATH . P.'/view/' . C .'/';
	$this->smarty->caching = false;

    $this->smarty->cache_dir = APP_PATH . P . '/cache';
    $this->smarty->cache_lifetime = 120;
   	$this->smarty->compile_dir = APP_PATH . P . 'template_c';
	 
	}
		//smarty的二次封装
	protected function assign($key,$value){
		//调用smarty实现
		$this->smarty->assign($key,$value);
	}

	protected function display($file){
		$this->smarty->display($file);
	}

	//封装后，子类控制器继承后，就可以直接使用$this->assign(key,value)了
}
