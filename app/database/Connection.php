<?php
namespace app\database;
use PDO;
use PDOException;

class Connection
{
  protected static function connect()
  {
    try {
      $pdo = new PDO('mysql:host='. $_ENV['DBHOST']. ';dbname='. $_ENV['DBNAME'], $_ENV['DBUSER'], $_ENV['DBPASSWORD']);
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $e) {
      die("Connection failed:" . $e->getMessage());
    }
  }

}