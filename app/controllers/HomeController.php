<?php 
namespace app\controllers;

use app\database\models\showNews;

class HomeController extends Controll{
    public function index(){
        $this->view(
            'home',['title'=>'Home']
            
        );
    }
}