<?php
namespace app\database\models\querys;
use app\support\GetMessages;
use app\support\UriId;
use app\database\Connection;
use PDO;
class SelectAdminId extends Connection
{
    public static function exec(){
        $id = UriId::exec(); 
        $pdo = Connection::connect();
        
        try {
            $query = "SELECT id,name,name2,email FROM user where id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return  $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (\Throwable $e) {
            GetMessages::getFlash('error_message','This news does not exist
            ');
            header("Location:/");
            exit;

        }
    }
}

    