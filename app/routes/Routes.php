<?php 
namespace app\routes;

class Routes{
    public static function get(){
        return[
            'get'=>[
                '/'=>'HomeController@index',  
                '/login'=>'LoginController@index',
                '/news/[0-9]+$'=>'NewsController@index',
                '/createNews'=>'CreateNewsController@index',
                '/register'=>'RegisterController@index',
                '/logout'=>'LogoutController@index'
            ],
            'post'=>[
                '/createNews'=>'CreateNewsController@exec',
                '/register'=>'RegisterController@exec',
                '/login'=>'LoginController@exec',
            ]
        ];
    }
}