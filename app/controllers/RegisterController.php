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
        $function = new Register;
        return $function->getValues();
    }
   
}
