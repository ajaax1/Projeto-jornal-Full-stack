<?php 
namespace app\controllers;

class LogoutController{
    public function index(){
        session_unset();
        session_destroy();
        header("Location:/login");
        exit();
    }
}