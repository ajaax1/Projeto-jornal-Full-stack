<?php 
namespace app\controllers;
use app\database\models\createNews;

class CreateNewsController extends Controll{
    
    public function viewCreateNews()
    {
        $this->view('admin/adminCreateNews', ['title'=>'Painel'
            ]);
    }
    
    public static function exec(){
    $insert = new createNews;
    return $insert->getValues();     
}

}