<?php
	//�����ļ�
return array(
	//���ݿ�����
    'database'=> array(
        'type' => 'mysql',		//���ݿ��Ʒ
    	'host' => 'localhost',
        'port' => '3306',
        'user' => 'root',
        'pass' => '666666',
        'charset' => 'utf8',
        'dbname'  => 'szxjy',
        'prefix'  => ''			//��ǰ׺
    ),
	//������Ϣ
	'drivers' =>array(),

	//��������
	'system'=>array(
		'error_reporting' => E_ALL,//���󼶱���ƣ�Ĭ����ʾ���д���
		'display_errors' => 1,	//������ʾ���ƣ�1��ʾ��ʾ����0��ʾ���ش���

		),
);