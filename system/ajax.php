<?php
    
    require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
    $action = $_GET['action'];

    if($action == 'login')
    {
        User::Login();
    }

    if($action == 'cadastro')
    {
        User::Cadastro();
    }

    if($action == 'esqsenha')
    {
        User::EsqueciSenha();
    }

    if($action == 'altsenha')
    {
        User::Altsenha();
    }

?>