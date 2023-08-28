<?php 
namespace app\controllers;
use app\database\models\createNews;

class CreateNewsController extends Controll{
    public function index(){
        $this->view(
            'createNews',['title'=>'Create Journalistic Matter']
        );
    }
    public static function exec(){
    $insert = new createNews;
    return $insert->getValues();     
}

}