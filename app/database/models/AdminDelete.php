<?php 
namespace  app\database\models;
use app\database\Connection;
use app\support\GetMessages;
use app\support\UriId;
use PDOException;
class AdminDelete extends Connection{
    private $id;
    public function delete(){
    try {
        $this->id = UriId::exec();
        if($_SESSION['id'] == $this->id){
            GetMessages::getFlash('error_message', 'You cannot delete the user itself');
            header("Location:/admin/info");
        }
        else{
            $pdo = Connection::connect();
            $sql = "delete from user where id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            GetMessages::getFlash('accept_message', 'The user has been deleted');
            header("Location:/admin/info");
            exit;
            }
        }
        catch (PDOException $e) {
            GetMessages::getFlash('error_message','An error has occurred');
            header("Location:/admin/info");
        }
    }
}