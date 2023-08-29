<?php
namespace app\database\models;
use app\database\Connection;
use app\support\EmailVerify;
use app\support\PasswordConfirm;
use app\support\GetMessages;
use app\support\NameFilter;
use PDOException;
class Register extends Connection
{   
    private $name;
    private $email;
    private $password;
    private $password2;
    public function getValues() {
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2'])){
            GetMessages::getFlash('error_message','some field is missing');
            header("Location:/register");
        } 
        else{
            $this->name = $_POST['name'];
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->password2 = $_POST['password2'];

        }     
    }

    private function insert(){
        try {
            $pdo = Connection::connect();
            $sql = "INSERT INTO user (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            $stmt->execute();
            GetMessages::getFlash('accept_message','Registration done! Sign in');
            header("Location:/login");
            exit;
        } catch (PDOException $e) {
            GetMessages::getFlash('accept_message','Erro');
            header("Location:/Register");
        }
    }
}
