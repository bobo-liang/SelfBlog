<?php
//������ڼǺţ����峣�����Ժ������ļ��ж��Ƿ��иó���
define('ACCESS',TRUE);	

//�����ϼ�Ŀ¼����
define('ROOT_PATH',str_replace('\\','/',dirname(__DIR__)).'/');
//���س�ʼ���ļ�
include ROOT_PATH.'core/App.php';
//�����ʼ��
\core\App::start();