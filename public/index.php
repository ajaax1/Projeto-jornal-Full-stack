<?php 
require '../vendor/autoload.php';
use Dotenv\Dotenv;
$patch = dirname(__FILE__,2);
$dotenv = Dotenv::createImmutable($patch);
$dotenv->Load();
require 'sessionConfig.php';
$router = new app\routes\RoutesControllers;
echo $router->run();


