<?php

	/* CONFIGURAÇÃO GLOBAL */
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

	/* CONFIGURAÇÃO DO BANCO DE DADOS */
	$db['host'] = 'localhost'; //HOST MYSQL
	$db['user'] = 'root'; //USUARIO MYSQL
	$db['pass'] = ''; //SENHA MYSQL
	$db['db'] = ''; //DATABASE MYSQL

	/* CONFIGURAÇÃO DE SMTP */
	/* sendinblue.com serviço smtp grátis | 300 emails por dia */
	require_once $_SERVER['DOCUMENT_ROOT'].'/system/lib/phpmailer/vendor/autoload.php';
	$config['SMTP_host'] = 'smtp-relay.sendinblue.com';
	$config['SMTP_porta'] = '587';
	$config['SMTP_user'] = '';
	$config['SMTP_senha'] = '';

	/* IMPORTA AS CLASSES */
	foreach (glob($_SERVER['DOCUMENT_ROOT'].'/system/classes/*.php') as $className)
	{
	require_once $className;
	}
	

?>