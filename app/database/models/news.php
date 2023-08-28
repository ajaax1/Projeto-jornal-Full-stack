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
        if (!$pdo) {
            return null;
        }
            $query = "SELECT user.name, DATE_FORMAT(news.date, '%d/%m/%Y') AS date, news.image, news.title, news.paragraphs1, news.paragraphs2, news.paragraphs3, news.paragraphs4, news.paragraphs5, news.paragraphs6 FROM user JOIN news ON news.id_user = user.id WHERE news.id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $arrayRegistros =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (!$arrayRegistros) {
            GetMessages::getFlash('error_message','This news does not exist
            ');
            header("Location:/");
            exit;
        } else {
            foreach ($arrayRegistros as $arr) {
                return ('
                <div class="d-flex justify-content-between">
                    <div><small>'.htmlspecialchars($arr['name']).'</small></div>
                    <div><small>'.htmlspecialchars($arr['date']).'</small></div>
                </div> 
                <div><h1 style="word-wrap: break-word;">'.htmlspecialchars($arr['title']).'</h1></div>
                <img style="width:100%;height:30rem;margin-bottom:1rem;" src="'.htmlspecialchars($arr['image']).'">
                <div style="color:#202224"><h5 style="word-wrap: break-word;">'.htmlspecialchars($arr['paragraphs1']).'<h5></div>
                <div style="color:#202224"><h5 style="word-wrap: break-word;">'.htmlspecialchars($arr['paragraphs2']).'<h5></div>
                <div style="color:#202224"><h5 style="word-wrap: break-word;">'.htmlspecialchars($arr['paragraphs3']).'<h5></div>
                <div style="color:#202224"><h5 style="word-wrap: break-word;">'.htmlspecialchars($arr['paragraphs4']).'<h5></div>
                <div style="color:#202224"><h5 style="word-wrap: break-word;">'.htmlspecialchars($arr['paragraphs5']).'<h5></div>
                <div style="color:#202224"><h5 style="word-wrap: break-word;">'.htmlspecialchars($arr['paragraphs6']).'<h5></div>       
               ');
            }
        }
    }
}
    