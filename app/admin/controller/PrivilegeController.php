<?php
//权限管理
namespace admin\controller;
use \core\Controller;
class PrivilegeController extends Controller{
	//获取登录表单界面
	public function index(){
	//加载登录表单模板
	$this->display('login.html');
	}
}
