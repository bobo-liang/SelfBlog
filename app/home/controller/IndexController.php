<?php
//�����ռ�
namespace home\controller;
//���빫��������
use \core\Controller;


class IndexController extends Controller{
    //Ĭ�Ϸ���
    public function index(){
		var_dump($this->smarty);
        echo '��ӭ����MVC��Ŀ��һ����Զ����ܣ�';
		 //����ģ��
        $m = new \home\model\TableModel();
        $res = $m->getById(1);

       	$this->assign('res',$res);
       	$this->display('index.html');
    }
}
