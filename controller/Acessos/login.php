<?php
session_start();
include_once "../../bootstrap.php";

use Controller\Classes\LDAPController;
use Controller\Classes\SessionController;


$usr = $_REQUEST['inputUsuario'];
$pwd = $_REQUEST['inputSenha'];

$ldap = new LDAPController();

$user = $ldap->checkAccess($usr, $pwd);

SessionController::setUser($user['usr'], $user['cpf'], $user['nome'], $user['email'], $user['bday']);

header('Location:/form.php');