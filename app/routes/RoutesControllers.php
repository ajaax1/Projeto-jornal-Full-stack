<?php
namespace app\routes;
use app\controllers\Controller;

class RoutesControllers{
    public static function run(){
        $routerRegistered = new RoutersFilter;
        $router = $routerRegistered->get();
        $controller = new Controller;
        $controller->execute($router);
    }
}