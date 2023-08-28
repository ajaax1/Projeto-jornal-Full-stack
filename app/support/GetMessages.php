<?php
namespace app\support;

class GetMessages{
    public static function getFlash($index, $message)
    {
        if (!isset($_SESSION[$index])) {
          return  $_SESSION[$index] = $message;
        }
    }
    
}
