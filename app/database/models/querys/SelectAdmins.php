<?php
namespace app\database\models\querys;
use app\database\Connection;
use app\support\GetMessages;
use PDO;

class SelectAdmins extends Connection
{
    private static $start = 0;
    private static $rowsPerPage = 2;

    public static function SelectAdmins()
    {
        try {
            self::Pages(); 
            $pdo = Connection::connect();
            $query_first = "SELECT * FROM `user`  LIMIT " . self::$start . "," . self::$rowsPerPage . ";";
            $stmt_first = $pdo->prepare($query_first);
            $stmt_first->execute();
            return $stmt_first->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            GetMessages::getFlash('error_message', 'Database error');
            header("Location:/admin/info/");
            exit;
        }
    }

    public static function fullPage()
    {
        try {
            $pdo = Connection::connect();
            $records = "SELECT * FROM user";
            $stmt = $pdo->prepare($records);
            $stmt->execute();
            $full = count($stmt->fetchAll(PDO::FETCH_ASSOC));
            $pages = $full / self::$rowsPerPage;
            return ceil($pages);
        } catch (\Throwable $e) {
            GetMessages::getFlash('error_message', 'Database error');
            header("Location:/admin/info/");
            exit;
        }
    }

    public static function Pages()
    {
        if (isset($_GET['page-nr'])) {
            $page = $_GET['page-nr'] - 1;
            self::$start = $page * self::$rowsPerPage;
        }
    }
}