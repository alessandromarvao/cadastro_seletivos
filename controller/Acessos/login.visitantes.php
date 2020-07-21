<?php
session_start();

require_once "../../bootstrap.php";

use Controller\Classes\SessionController;
Use Model\Bancos;
Use Model\Escolas;

SessionController::set('bancos', Bancos::read());
SessionController::set('escolas', Escolas::read());

header('Location:../../form_visitantes.php');
