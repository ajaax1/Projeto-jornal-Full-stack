<?php
namespace app\database\models;
use app\support\GetMessages;
use app\support\UriId;
use app\database\Connection;
use PDO;
class news extends Connection
{
    public static function exec(){
        $id = UriId::exec(); 
        $pdo = Connection::connect();
        
        try {
            $query = "SELECT user.name, user.name2, DATE_FORMAT(news.date, '%d/%m/%Y') AS date, news.image, news.title, news.paragraphs1, news.paragraphs2, news.paragraphs3, news.paragraphs4, news.paragraphs5, news.paragraphs6 FROM user JOIN news ON news.id_user = user.id WHERE news.id = :id";
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

    