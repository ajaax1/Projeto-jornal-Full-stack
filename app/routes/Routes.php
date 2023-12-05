<?php 
namespace app\routes;

class Routes{
    public static function get(){
        return[
            'get'=>[
                '/'=>'HomeController@index',
                '/admin/news/update/[a-zA-Z0-9-]+/[0-9]+$'=>'AdminController@viewUpdateNews',
                '/admin/info/search'=>'AdminController@search',
                '/admin/info'=>'AdminController@viewAdminInfo',
                '/admin/delete/[0-9]+$'=>'AdminController@Delete',
                '/admin/update/[0-9]+$'=>'AdminController@viewAdminUpdate',
                '/admin/[a-zA-Z]+/[0-9]+$'=>'AdminController@viewAdmin',
                '/admin/login'=>'AdminController@viewLogin',
                '/admin/register'=>'AdminController@viewAdminRegister',
                '/admin'=>'AdminController@viewLogin',
                '/news/[0-9]+$'=>'NewsController@index',
                '/admin/infoNews'=>'AdminController@viewInfoNews',
                '/admin/createNews'=>'CreateNewsController@viewCreateNews',
                '/admin/logout'=>'AdminController@logout',
            ],
            'post'=>[
                '/admin/update/[0-9]+$'=>'AdminController@update',
                '/admin/createNews'=>'CreateNewsController@exec',
                '/admin/register'=>'AdminController@register',
                '/admin/login'=>'AdminController@login',
            ]
        ];
    }
}