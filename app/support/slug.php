<?php
namespace app\support;
class Slug{
    public static function exec($string) {
        $slug = str_replace(' ', '-', $string);
        $slug = strtolower($slug);
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        return $slug;
    }
}