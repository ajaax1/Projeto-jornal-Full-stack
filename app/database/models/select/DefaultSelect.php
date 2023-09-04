<?php
namespace app\database\models\select;
use app\database\Connection;
use app\support\GetMessages;
use PDO;

class DefaultSelect extends Connection
{
    private static $start = 0;
    private static $rowsPerPage = 9;
    public static function mainNews()
    {
        try {
            $pdo = Connection::connect();
            $query_first = "SELECT n.id, n.title, n.paragraphs1, DATE_FORMAT(n.date, '%d/%m/%Y') AS date, n.hour, u.name, u.name2, n.image
            FROM news AS n
            INNER JOIN user AS u ON n.id_user = u.id
            WHERE n.id = (
                SELECT MAX(id)
                FROM news
            );";

            $stmt_first = $pdo->prepare($query_first);
            $stmt_first->execute();
            return $stmt_first->fetchAll(PDO::FETCH_ASSOC);

        } 
        catch (\Throwable $e) {
            GetMessages::getFlash('error_message','Database error');
            header("Location:/");
            exit;

        }
    }
    public static function allNews()
    {
        try {
            $pdo = Connection::connect();
            $query_second = "SELECT news.id, news.title, news.paragraphs1, DATE_FORMAT(news.date, '%d/%m/%Y') AS date, news.hour, user.name, user.name2, news.image
            FROM news
            INNER JOIN user ON news.id_user = user.id
            WHERE news.id < (
                SELECT MAX(id)
                FROM news
            )
            ORDER BY news.id DESC
            LIMIT ".self::$start.",".self::$rowsPerPage.";";


            $stmt_second = $pdo->prepare($query_second);
            $stmt_second->execute();
            return $stmt_second->fetchAll(PDO::FETCH_ASSOC);

        } catch (\Throwable $e) {
            GetMessages::getFlash('error_message','Database error');
            header("Location:/");
            exit;

        }
    }
    public static function fullPage(){
        try {
            $rows_per_page = 9;
            $pdo = Connection::connect();
            $records ="SELECT * FROM news"; 
            $stmt = $pdo->prepare($records);
            $stmt->execute();
            $full = COUNT($stmt->fetchAll(PDO::FETCH_ASSOC));
            $pages = $full/self::$rowsPerPage;
            return ceil($pages);

        } catch (\Throwable $e) {
            GetMessages::getFlash('error_message','Database error');
            header("Location:/");
            exit;

        }
    }  

    public static function Pages(){
        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;   
            self::$start = $page * self::$rowsPerPage ;  
        }
    }
  
}


