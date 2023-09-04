<?php
namespace app\controllers;
use app\database\models\Register;
class RegisterController extends Controll
{
    public function index()
    {
        $this->view('register', [
            'title'=>'Register']);
    }
    public function exec()
    {
        $function = new Register($_POST['name'],$_POST['name2'],$_POST['email'],$_POST['password'],$_POST['password2'],);
        return $function->getValues();
    }
   
}
