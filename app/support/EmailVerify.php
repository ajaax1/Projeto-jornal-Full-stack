<?php
namespace app\support;
use app\database\Connection;
use app\support\UriId;
class EmailVerify extends Connection {
    public static function exists($email){
        $id = UriId::exec();
        if($id === null){
            $pdo = Connection::connect();
            $sql = "SELECT email FROM user WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }else{
            $pdo = Connection::connect();
            $sql = "SELECT email FROM user WHERE email = :email and id <> :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }
        
    }
} 