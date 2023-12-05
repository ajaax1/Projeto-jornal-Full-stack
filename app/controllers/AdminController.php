<?php

namespace app\controllers;

use app\database\models\AdminDelete;
use app\database\models\AdminUpdate;
use app\database\models\AdminRegister;
use app\database\models\Login;
use app\support\UriId;

class AdminController extends Controll
{
    public function viewAdmin()
    {
        $this->view('admin/admin', ['title'=>'Painel'
            ]);
    }
    public function viewAdminRegister()
    {
        $this->view('admin/adminRegister', ['title'=>'Register'
            ]);
    }
    public function viewAdminUpdate(){
        $this->view('admin/adminUpdate', ['title'=>'Update'
            ]);
    }
    public function viewLogin(){
        $this->view('admin/adminlogin', ['title'=>'Login'
            ]);
    }
    public function viewAdminInfo(){
        $this->view('admin/adminInfo', ['title'=>'Info'
            ]);
    }

    public function viewUpdateNews(){
        $this->view('admin/adminUpdateNews', ['title'=>'Info'
            ]);
    }

    public function viewInfoNews(){
        $this->view('admin/adminInfoNews', ['title'=>'Info'
            ]);
    }
    public function update(){
        $function = new AdminUpdate($_POST['name'],$_POST['name2'],$_POST['email'],$_POST['password'],$_POST['password2']);
        return $function->getValues();
    }
    public function register(){
        $function = new AdminRegister($_POST['name'],$_POST['name2'],$_POST['email'],$_POST['password'],$_POST['password2'],);
        return $function->getValues();
    }

    public function delete(){
        $function = new AdminDelete();
        return $function->delete();
    }
    
    public function login()
    {
        $login = new Login($_POST['email'],$_POST['password']);
        return $login->getValues();
    }
    public function logout(){
        session_unset();
        session_destroy();
        header("Location:/admin/login");
        exit();
    }
    public function search() {
        $this->view('admin/AdminInfoSearch', ['title'=>'Info'
            ]);
    }
}
