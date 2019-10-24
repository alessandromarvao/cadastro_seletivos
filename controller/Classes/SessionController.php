<?php

namespace Controller\Classes;

class SessionController
{
    public static function setUser($user, $cpf, $nome, $email, $nascimento){
        $_SESSION['user'] = $user;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['nascimento'] = $nascimento;

        return TRUE;
    }

    public static function set($param, $value){
        $_SESSION[$param] = $value;
    }

    public static function get($param){
        if(!empty($_SESSION[$param])) {
            return $_SESSION[$param];
        } else {
            return NULL;
        }        
    }

    public static function checkLogin(){
        // $_SESSION['error'] = 'true';
    }

    public static function getAccess(){
        return $_SESSION['access'];
    }

    public static function getUser(){
        return $_SESSION['user'];
    }

    public static function checkAccess(){
        if(isset($_SESSION['user'])) {
            echo $_SESSION['user'];
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function close(){
        session_destroy();

        return TRUE;
    }
}