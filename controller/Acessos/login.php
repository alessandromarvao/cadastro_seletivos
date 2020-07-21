<?php
session_start();
include_once "../../bootstrap.php";

use Controller\Classes\LdapController;
use Controller\Classes\SessionController;
Use Model\Bancos;
Use Model\Escolas;


$usr = $_REQUEST['inputUsuario'];
$pwd = $_REQUEST['inputSenha'];

$ldap = new LDAPController();

if($user = $ldap->checkAccess($usr, $pwd)){
    SessionController::setUser($user['usr'], $user['cpf'], $user['nome'], $user['email'], $user['bday']);
    SessionController::set('bancos', Bancos::read());
    SessionController::set('escolas', Escolas::read());
    
    // echo SessionController::get('user');
    header('Location:/form.php');
} else {
    header('Location:/index.php?m=error');
}

