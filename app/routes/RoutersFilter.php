<?php
namespace app\routes;

class RoutersFilter{
    
    private $uri;
    private $method;
    private $routesRegistered;
    public function __construct() {
        $this->uri = Uri::get();
        $this->method = RequestType::get();
        $this->routesRegistered = Routes::get();
    }
    public function simpleRouter(){
        if(array_key_exists($this->uri,$this->routesRegistered[$this->method])){
            
            return $this->routesRegistered[$this->method][$this->uri];
            
        }
        return null;
    }
    private function dynamicRouter(){
        foreach($this->routesRegistered[$this->method] as $index => $route){
            $regex = str_replace('/','\/',ltrim($index,'/'));
            if($index !== '/' && preg_match("/^$regex/",trim($this->uri,'/'))){
              $routerRegistredFound = $route;
            break;
            }else{
                $routerRegistredFound = null;;
            }

        }
        return $routerRegistredFound;
    }

    public function get(){
        $router = $this->simpleRouter();
        
        if ($router){
            return $router;
        }

        $router= $this->dynamicRouter();
        if ($router){
            
            return $router;
        }
        return "NotFoundController@index";
    }
  
}

