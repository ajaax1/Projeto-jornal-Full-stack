<?php
namespace app\database\models;
use app\database\Connection;
use app\support\GetMessages;
use app\support\RegisterFilter;
use PDOException;
class AdminRegister extends Connection
{   
    private $name;
    private $name2;
    private $email;
    private $password;
    private $password2;
    private $createBy;
    private $updateBy;

    public function __construct($name,$name2,$email,$password,$password2) {
        $this->name = ucfirst(strtolower($name));
        $this->name2 = ucfirst(strtolower($name2));
        $this->email = $email ;
        $this->password = $password;
        $this->password2 = $password2;
        $this->createBy = $_SESSION['id'];
        $this->updateBy = 'null';
    }
    public function getValues() {
        if(empty($this->name) || empty($this->name2) || empty($this->email) || empty($this->password) || empty($this->password2)){
            GetMessages::getFlash('error_message','some field is missing');
            header("Location:/admin/register");
            exit;
        } 
        elseif(RegisterFilter::name($this->name) and RegisterFilter::name($this->name2)  and RegisterFilter::email($this->email) and RegisterFilter::password($this->password,$this->password2)){
            $this->password = password_hash($this->password,PASSWORD_DEFAULT);
            return $this->insert();
        }   
    }

    private function insert(){
        try {
            $pdo = Connection::connect();
            $sql = "INSERT INTO user (name,name2,email,password,createBy,updateBy) VALUES (:name, :name2, :email, :password,:createBy,:updateBy)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name',  $this->name);
            $stmt->bindParam(':name2',  $this->name2);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password',$this->password);
            $stmt->bindParam(':createBy', $this->createBy);
            $stmt->bindParam(':updateBy', $this->updateBy);
            $stmt->execute();
            GetMessages::getFlash('accept_message','Registered administrator!');
            header("Location:/admin/register");
            exit;
        } catch (PDOException $e) {
            GetMessages::getFlash('error_message','Database off');
            header("Location:/admin/register");
        }
    }
}
