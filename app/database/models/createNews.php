<?php
namespace app\database\models;
use app\database\Connection;
use app\support\GetMessages;
use PDOException;
use app\support\Slug;


class CreateNews extends Connection
{
    private $title;
    private $date;
    private $hour;
    private $destination;
    private $paragraphs;
    private $slug;
    public function getValues()
    {
        if(empty($_POST['title']) || empty($_POST['paragraphs1']) || empty($_FILES["image"]["name"])) {
            GetMessages::getFlash('error_message', 'Fill in the inputs');
            header("Location:/admin/createNews");
        } else {
            date_default_timezone_set('America/Sao_Paulo');
            $this->title =  $_POST['title'];
            $this->date = date('Y/m/d');
            $this->hour = date("h:i A");
            $this->slug = Slug::exec($this->title);
            $uploadDir = "../assets/img/";
            $tempFile = $_FILES["image"]["tmp_name"];
            $image = $_FILES["image"]["name"];
            $this->destination = $uploadDir . $image;
            move_uploaded_file($tempFile, $this->destination);
            $this->paragraphs = [];
            for ($i = 1; $i <= 6; $i++) {
                $this->paragraphs[] = isset($_POST["paragraphs$i"]) ? $_POST["paragraphs$i"] : '';
            }
            return $this->insert();
        }

    }
    private function insert()
    {
        try {
        $pdo = Connection::connect();
        $sql = "INSERT INTO news (title, slug, paragraphs1, paragraphs2, paragraphs3, paragraphs4, paragraphs5, paragraphs6, date,hour, id_user,image)
                VALUES (:title, :slug ,:paragraphs1, :paragraphs2, :paragraphs3, :paragraphs4, :paragraphs5, :paragraphs6, :date,:hour , :id,:image)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':hour', $this->hour);
        $stmt->bindParam(':slug', $this->slug);
        $stmt->bindParam(':image', $this->destination);
        for ($i = 1; $i <= 6; $i++) {
            $stmt->bindParam(":paragraphs$i", $this->paragraphs[$i - 1]);
        }
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->execute();
        header("Location:/admin/createNews");    
        } catch (PDOException $e) {
            return $e;
        }
    }
}
