<?php
//�����ռ�
namespace core;
class Controller{
	//��������;�������Ϊ�����ܹ����úͷ��ʣ��Լ��緽����
	protected $smarty;

	//���췽����ʵ��һЩ��Ҫ��ʼ������ʹ�õ�����
	public function __construct(){
	//1��ʵ��smarty�ĳ�ʼ��
	//����Smarty

	include VENDOR_PATH . 'smarty/Smarty.class.php';

	//ʵ����
	$this->smarty = new \Smarty();

	//����Smarty
	$this->smarty->template_dir = APP_PATH . P.'/view/' . C .'/';
	$this->smarty->caching = false;

    $this->smarty->cache_dir = APP_PATH . P . '/cache';
    $this->smarty->cache_lifetime = 120;
   	$this->smarty->compile_dir = APP_PATH . P . 'template_c';
	 
	}
		//smarty�Ķ��η�װ
	protected function assign($key,$value){
		//����smartyʵ��
		$this->smarty->assign($key,$value);
	}

	protected function display($file){
		$this->smarty->display($file);
	}

	//��װ������������̳к󣬾Ϳ���ֱ��ʹ��$this->assign(key,value)��
}
