<?php

namespace app\controllers;
use League\Plates\Engine;


class NewsController extends Controll{
    public function index(){
        $this->view('news');
    }
    
}