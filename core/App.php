<?php
//���������ռ�
namespace core;
//ȷ�Ϸ�����ȷ
if(!defined('ACCESS')){
    //û�ж���ACCESS����������������
    header('location:../public/index.php');
    exit;
}

//��ʼ����
class App{
//��ڷ���
	public  static function start(){
	
		//Ŀ¼��������
		self::set_path();
		//�����ļ�
		self::set_config();
		//������
		self::set_error();
		//����URL
		self::set_url();
		//�Զ�����
		self::set_autoload();
		//�ַ�������
		self::set_dispatch();




	}
//����Ŀ¼����
private static function set_path(){
    //���岻ͬ·������������Ŀ¼��AppĿ¼��������Ŀ¼��ģ��Ŀ¼����ͼĿ¼����չĿ¼
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

//���Ӵ�����Ʒ���
private static function set_error(){
	//�������ļ���ȡ��ȫ�ֱ���
	global $config;
	//var_dump($config);
    //�������ͺʹ�����ʽ
   // @ini_set('error_reporting',$global['system']['error_reporting']');	//E_ALLΪϵͳ��������ʾ���д���
	    @ini_set('error_reporting',$global['system']['error_reporting']);	//E_ALLΪϵͳ��������ʾ���д���
		@ini_set('displary_errors',$global['system']['displary_errors']);	//��ʾ������Ϣ

	}
//���������ļ�
private static function set_config(){
	global $config;
	//���������ļ�
	$config = include CONFIG_PATH . 'config.php';
	}
//����URL
private static function set_url(){
    //��ȡǰ��̨�����������ֺͷ������֣��涨�����������Я��p������c������a������p����platformƽ̨��c����controller��a����action��
    $p = $_REQUEST['p'] ?? 'home';			//Ĭ��ǰ̨
    $c = $_REQUEST['c'] ?? 'Index';			//Ĭ��IndexController
    $a = $_REQUEST['a'] ?? 'index';			//Ĭ��index����
    
    //��ʱֻ�ǽ��������ַ������ǵ�������Ҫʹ�ã��趨Ϊ����
    define('P',$p);
    define('C',$c);
    define('A',$a);
	//echo P,C,A;
}
//�Զ����ط������Զ��巽����
private static function set_autoload_function($class){
	//$class �����ڴ��в����ڵ��ࣨ�����Ŀ���������ռ䣬��ô��ʱ���ſռ�·����/home/controller/Indexcontroller
	//$ȡ������
	$class = basename($class);

	//�ж��ļ����Ƿ����
	$core_file = CORE_PATH . $class . '.php';
	if(file_exists($core_file)) include $core_file;
	//�ж��������Ƿ���ڣ�����ǰ��̨��
	$cont_file  = APP_PATH . P . '/controller/' . $class . '.php';
	if(file_exists($cont_file)) include $cont_file;

	//�ж�ģ���Ƿ����
	$model_file  = APP_PATH . P.'/model/' . $class . '.php';
	if(file_exists($model_file)) include $model_file;

	//�������
	$vendor_file = VENDOR_PATH . $class . '.php';
	if(file_exists($vendor_file)) include $vendor_file;


}
//ע���Զ�����
private static function set_autoload(){
//����set_autoload_register����ע��
	spl_autoload_register(array(__CLASS__,'set_autoload_function'));

	}
	//�ַ�������
private static function set_dispatch(){
	//�ҵ�ǰ��̨����������
	$p = P;
	$c = C;
	$a = A;
	//��֯�ɺ��ʵĿռ�Ԫ��
	$controller = "\\$p\\controller\\{$c}Controller";

	//echo $controller;
	$c = new $controller();//�Ѿ��õ����󣬵��ö���
	//���ö������շַ�
	$c ->$a();  //�ɱ䷽��

}

}