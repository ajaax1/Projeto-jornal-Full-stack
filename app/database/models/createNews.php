<?php

namespace app\database\models;

use app\database\Connection;
use app\routes\RequestType;
use app\support\GetMessages;
use PDOException;

class createNews extends Connection
{
    private $title;
    private $date;
    private $destination;
    private $paragraphs;

    public function getValues()
    {
        if(empty($_POST['title']) || empty($_POST['paragraphs1']) || empty($_FILES["image"])) {
            GetMessages::getFlash('error_message', 'fill in the inputs');
            header("Location:/createNews");
        } else {
            $this->title =  $_POST['title'];
            $this->date = date('Y/m/d');
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
        $sql = "INSERT INTO news (title, paragraphs1, paragraphs2, paragraphs3, paragraphs4, paragraphs5, paragraphs6, date, id_user,image)
                VALUES (:title, :paragraphs1, :paragraphs2, :paragraphs3, :paragraphs4, :paragraphs5, :paragraphs6, :date, :id,:image)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':image', $this->destination);
        for ($i = 1; $i <= 6; $i++) {
            $stmt->bindParam(":paragraphs$i", $this->paragraphs[$i - 1]);
        }
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->execute();
        header("Location:/");    
        } catch (PDOException $e) {
            return $e;
        }
    }
}
