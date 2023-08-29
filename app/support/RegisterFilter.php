<?php 
namespace app\support;
use app\support\EmailVerify;
use app\support\GetMessages;
use app\support\PasswordConfirm;

class RegisterFilter {
    
    public static function name($name) 
    {
        $all = strlen($name);
        for ($i = 0; $i < $all; $i++) {
            $char = $name[$i];
            if (!ctype_alpha($char)) {
                GetMessages::getFlash('error_message','No special characters are accepted in the name, letters only');
                header("Location:/register");
        die; 
            }
        }
            return true; 
    }
    
    public static function email($email) 
    {   if(str_contains($email,"@")){

            if (EmailVerify::exists($email)) {
                return
                GetMessages::getFlash('error_message','Email in use');
                header("Location:/register");
                die;

            }
            else{
                
            }  
        }
        else{
            return
            GetMessages::getFlash('error_message','Wrong email format');
            header("Location:/register");
            die; 
        }
    }

    public static function password($password) 
    {
        
    }

    public static function password2($password,$password2) 
    {
        if(PasswordConfirm::exec($password,$password2)){
            return   $password = password_hash($password, PASSWORD_DEFAULT);
        }
        else{
            GetMessages::getFlash('error_message','Passwords do not match');
            header("Location:/register");
            die;
        }  
    }
    

}