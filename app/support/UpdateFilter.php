<?php 
namespace app\support;
use app\routes\Uri;
use app\support\EmailVerify;
use app\support\GetMessages;
use app\support\PasswordConfirm;

class UpdateFilter {

    private static $url;

    public static function getUrl() {
        $id = UriId::exec();
        if(str_contains(Uri::get(),'update')){
            self::$url = "/admin/update/$id";
            return self::$url;
        }
        else{
            self::$url = "/admin/" . $_SESSION['name'] . "/" . $_SESSION['id'];
            return self::$url;
        }      
    }

    public static function name(string $name)
    {
        if (preg_match('/[^A-Za-z]/', $name)) {
            GetMessages::getFlash('error_message', 'The name field must not exceed 15 characters');
            $url = self::getUrl();
            header('Location:'.$url);
            exit;
        } elseif (strlen($name) > 15) {
            GetMessages::getFlash('error_message', 'The name field must not exceed 15 characters');
            $url = self::getUrl();
            header('Location:'.$url);
            exit;
        }
        
        return true; 
    }
    public static function name2(string $name2)
    {
        if (preg_match('/[^A-Za-z]/', $name2)) {
            GetMessages::getFlash('error_message', 'The name field only accepts letters');
            $url = self::getUrl();
            header('Location:'.$url);
            exit;
        }
        elseif (strlen($name2) > 15) {
            GetMessages::getFlash('error_message', 'The name field must not exceed 15 characters');
            $url = self::getUrl();
            header('Location:'.$url);
            exit;
        }
        
        return true; 
    }
    
    public static function email($email)
    {   if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            if (EmailVerify::exists($email)) {
                GetMessages::getFlash('error_message', 'Email is already in use');
                $url = self::getUrl();
                header('Location:'.$url);
                exit;
            }
            else{
                return true;
            }  
        }
        else{
            GetMessages::getFlash('error_message', 'The email is in the wrong format');
            $url = self::getUrl();
            header('Location:'.$url);
            exit;
        }
    }
    public static function password($password, $password2) {
        if ($password !== $password2) {
            GetMessages::getFlash('error_message', 'Passwords are not the same');
            $url = self::getUrl();
            header('Location:'.$url);
            exit; 
        }
    
        $length = strlen($password);
        if ($length < 7) {
            GetMessages::getFlash('error_message', 'Password should be at least 7 characters long');
            $url = self::getUrl();
            header('Location:'.$url);
            exit; 
        }
    
        if (!preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password)) {
            GetMessages::getFlash('error_message', 'Password should contain both lowercase and uppercase letters');
            $url = self::getUrl();
            header('Location:'.$url);
            exit; 
        }
    
        if (!preg_match('/\d/', $password)) {
            GetMessages::getFlash('error_message', 'Password should contain at least one number');
            $url = self::getUrl();
            header('Location:'.$url);
            exit; 
        }
    
        return true;
    }
}