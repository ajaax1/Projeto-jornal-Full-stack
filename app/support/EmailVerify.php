<?php
namespace app\support;
use app\database\Connection;
class EmailVerify extends Connection {
    public static function exists($email){
        $pdo = Connection::connect();
        $sql = "SELECT email FROM user WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}