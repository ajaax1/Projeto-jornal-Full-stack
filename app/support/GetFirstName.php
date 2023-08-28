<?php 
namespace app\support;
class GetFirstName{
    public static function get($fullName) {
        $firstEspace = strpos($fullName, ' ');
        if ($firstEspace === false) {
            return $fullName;
        } else {
            return substr($fullName, 0, $firstEspace); 
        }
    }
}