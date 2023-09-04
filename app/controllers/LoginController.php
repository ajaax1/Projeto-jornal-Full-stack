<?php

namespace app\controllers;
use app\database\models\Login;
class LoginController extends Controll
{
    public function index()
    {
        $this->view('login', ['title'=>'Login'
            ]);
    }
    public function exec()
    {
        $login = new Login($_POST['email'],$_POST['password']);
        return $login->getValues();
    }
}
