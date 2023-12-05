<?php 
namespace app\support;
use app\routes\Uri;
class UriId{
    public static function exec(){
        $uri = explode('/',Uri::get());
        $uri = array_filter($uri); 
        foreach ($uri as $key) {
           if(is_numeric($key)){
                return $key;
           }
        } 
    }
}