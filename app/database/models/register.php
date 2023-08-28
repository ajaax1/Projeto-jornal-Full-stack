<?php
namespace app\database\models;
use app\database\Connection;
use app\support\EmailVerify;
use app\support\PasswordConfirm;
use app\support\GetMessages;
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

            $this->name = ucfirst($_POST['name']);
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->password2 = $_POST['password2'];
            if(PasswordConfirm::exec($this->password,$this->password2)){
                $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            }
            else{
                GetMessages::getFlash('error_message','Passwords do not match');
                header("Location:/register");
                die;
            }
            if (EmailVerify::exists($this->email)) {
                GetMessages::getFlash('error_message','Email in use');
                header("Location:/register");
                die;
            }
            else{
                $this->insert();
            }
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
