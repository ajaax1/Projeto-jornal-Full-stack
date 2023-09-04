<?php 
namespace app\support;
use app\support\EmailVerify;
use app\support\GetMessages;
use app\support\PasswordConfirm;

class RegisterFilter {
    public static function name(string $name)
    {
        if (preg_match('/[^A-Za-z]/', $name)) {
            GetMessages::getFlash('error_message', 'The name field must not exceed 15 characters');
            header("Location: /register");
            exit;
        } elseif (strlen($name) > 15) {
            GetMessages::getFlash('error_message', 'The name field must not exceed 15 characters');
            header("Location: /register");
            exit;
        }
        
        return true; 
    }
    public static function name2(string $name2)
    {
        if (preg_match('/[^A-Za-z]/', $name2)) {
            GetMessages::getFlash('error_message', 'The name field only accepts letters');
            header("Location:/register");
            exit;
        }
        elseif (strlen($name2) > 15) {
            GetMessages::getFlash('error_message', 'The name field must not exceed 15 characters');
            header("Location: /register");
            exit;
        }
        
        return true; 
    }
    
    public static function email($email)
    {   if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            if (EmailVerify::exists($email)) {
                GetMessages::getFlash('error_message', 'Email is already in use');
                header("Location:/register");
                exit;
            }
            else{
                return true;
            }  
        }
        else{
            GetMessages::getFlash('error_message', 'The email is in the wrong format');
            header("Location:/register");
            exit;
        }
    }
    public static function password($password, $password2) {
        if ($password !== $password2) {
            GetMessages::getFlash('error_message', 'Passwords are not the same');
            header("Location:/register");
            exit; 
        }
    
        $length = strlen($password);
        if ($length < 7) {
            GetMessages::getFlash('error_message', 'Password should be at least 7 characters long');
            header("Location:/register");
            exit; 
        }
    
        if (!preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password)) {
            GetMessages::getFlash('error_message', 'Password should contain both lowercase and uppercase letters');
            header("Location:/register");
            exit; 
        }
    
        if (!preg_match('/\d/', $password)) {
            GetMessages::getFlash('error_message', 'Password should contain at least one number');
            header("Location:/register");
            exit; 
        }
    
        return true;
    }
}