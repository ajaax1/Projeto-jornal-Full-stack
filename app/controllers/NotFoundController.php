<?php 
namespace app\controllers;
class NotFoundController extends Controll{
    public function index(){
        $this->view(
            'NotFound',['title'=>'NotFound']
            
        );
    }
}

?>