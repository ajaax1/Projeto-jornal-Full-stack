<?php
namespace app\database\models;
use app\database\Connection;
use app\support\GetMessages;
use app\support\RegisterFilter;
use PDOException;
class Register extends Connection
{   
    private $name;
    private $name2;
    private $email;
    private $password;
    private $password2;

    public function __construct($name,$name2,$email,$password,$password2) {
        $this->name = ucfirst(strtolower($name));
        $this->name2 = ucfirst(strtolower($name2));
        $this->email = $email ;
        $this->password = $password;
        $this->password2 = $password2;
    }
    public function getValues() {
        if(empty($this->name) || empty($this->name2) || empty($this->email) || empty($this->password) || empty($this->password2)){
            GetMessages::getFlash('error_message','some field is missing');
            header("Location:/register");
            exit;
        } 
        elseif(RegisterFilter::name($this->name) and RegisterFilter::name($this->name2)  and RegisterFilter::email($this->email) and RegisterFilter::password($this->password,$this->password2)){
            return $this->insert();
        }   
    }

    private function insert(){
        try {
            $pdo = Connection::connect();
            $sql = "INSERT INTO user (name,name2,email, password) VALUES (:name, :name2, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name',  $this->name);
            $stmt->bindParam(':name2',  $this->name2);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', password_hash($this->password,PASSWORD_DEFAULT));
            $stmt->execute();
            GetMessages::getFlash('accept_message','Registration done! Sign in');
            header("Location:/login");
            exit;
        } catch (PDOException $e) {
            GetMessages::getFlash('accept_message','Database off');
            header("Location:/register");
        }
    }
}
