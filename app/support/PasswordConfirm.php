<?php 
namespace app\support;
class PasswordConfirm{
    public static function exec($password,$password2){
        if($password==$password2){
            return true;
        }
        else{
            return false;
        }
    }
}