<?php

namespace app\database\models;
use app\support\GetMessages;
use app\database\Connection;
use app\support\GetFirstName;
use app\support\PasswordConfirm;
use app\support\PasswordVerify;
use PDO;
use PDOException;
class Login extends Connection
{
    private $email;
    private $password;
    public function __construct($email,$password) {
        $this->email = $email;
        $this->password = $password;
    }
    public function getValues(){
        if(empty( $this->email) || empty( $this->password)){
            GetMessages::getFlash('error_message','Some field is missing');
            header("Location:/login");
        }else{
            $this->insert();
        }
        
    }
    private function insert()
    {
        try {
            $pdo = Connection::connect(); 
            $query_data = "SELECT id, name, email, password FROM user WHERE email = :email";
            $stmt_user = $pdo->prepare($query_data);
            $stmt_user->bindParam(':email', $this->email);
            $stmt_user->execute();
            $user = $stmt_user->fetch(PDO::FETCH_ASSOC); 
        
            if ($user && password_verify($this->password, $user['password'])) {
                $_SESSION['name'] = $user['name'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['logged'] = true;
                header("Location: /");
                exit;
            } else {
                GetMessages::getFlash('error_message', 'Incorrect password or email
                ');
                header("Location: /login");
                exit;
            }
        } catch (PDOException $e) {
            GetMessages::getFlash('error_message', 'Connection error');
            header("Location: /login");
            exit;
        }
        
        
    }    
}


