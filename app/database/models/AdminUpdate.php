<?php
namespace app\database\models;
use app\database\Connection;
use app\routes\Uri;
use app\support\GetMessages;
use app\support\UpdateFilter;
use app\support\UriId;
use PDOException;
class AdminUpdate extends Connection{ 
    private $name;
    private $name2;
    private $email;
    private $password;
    private $password2;
    private $id;
    private $updateBy;
    private $urlName;
    private $urlUpdate;
    public function __construct($name,$name2,$email,$password,$password2) {
        $this->name = ucfirst(strtolower($name));
        $this->name2 = ucfirst(strtolower($name2));
        $this->email = $email ;
        $this->password = $password;
        $this->password2 = $password2;
        $this->id = UriId::exec();
        $this->urlUpdate = "/admin/update/$this->id";
        $this->urlName = "/admin/" . $_SESSION['name'] . "/" . $_SESSION['id'];
        $this->updateBy = $_SESSION['id'];
    }
    public function getValues() {
        if(empty($this->name) || empty($this->name2) || empty($this->email) || empty($this->password) || empty($this->password2)){
            if(str_contains(Uri::get(),'update')){
                GetMessages::getFlash('error_message','some field is missing');
                header("Location:$this->urlUpdate");
                exit;
            }
            else{
                GetMessages::getFlash('error_message','some field is missing');
                header("Location:$this->urlName");
                exit;
            }
        } 
        elseif(UpdateFilter::name($this->name) and UpdateFilter::name($this->name2)  and UpdateFilter::email($this->email) and UpdateFilter::password($this->password,$this->password2)){
            $this->password = password_hash($this->password,PASSWORD_DEFAULT);
            return $this->update();
        }   
    }

    private function update(){
        try {
            $pdo = Connection::connect();
            $sql = "UPDATE user SET name = :name, name2 = :name2, email = :email, password = :password, updateBy = :updateBy WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name',  $this->name);
            $stmt->bindParam(':name2',  $this->name2);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':updateBy', $this->updateBy);
            
            $stmt->execute();
            GetMessages::getFlash("accept_message","Success!!");
            if(str_contains(Uri::get(),'update')){
                header("Location:$this->urlUpdate");
                exit;
            }
            else{
                header("Location:$this->urlName");
                exit;
            }
        } catch (PDOException $e) {
            GetMessages::getFlash('accept_message','Database off');
            if(str_contains(Uri::get(),'update')){
                header("Location:$this->urlUpdate");
                exit;
            }
            else{
                header("Location:$this->urlName");
                exit;
            }
        }
    }
}
