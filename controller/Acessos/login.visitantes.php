<?php
session_start();
include_once "../../bootstrap.php";

use Controller\Classes\SessionController;
Use Model\Bancos;
Use Model\Escolas;


$usr = $_REQUEST['inputUsuario'];
$pwd = $_REQUEST['inputSenha'];

SessionController::set('bancos', Bancos::read());
SessionController::set('escolas', Escolas::read());

header('Location:/cadastro_seletivos/form_visitantes.php');
