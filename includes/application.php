<?php
require_once 'database.php';
class Application extends Database
{
    public function filter($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function getUserByUsername($username){
        $st = $this->conn->prepare('SELECT ID,USERNAME,PASSWORD,ROLE_ID FROM M_USER WHERE USERNAME=:USERNAME');
        $st->bindParam(':USERNAME',$username);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function addUser($username,$password,$role_id,$token,$created_at){
        $st = $this->conn->prepare('InSERT INTO M_USER(USERNAME,PASSWORD,ROLE_ID,TOKEN,CREATED_AT) VALUES(:USERNAME,:PASSWORD,:ROLE_ID,:TOKEN,:CREATED_AT)');
        $st->bindParam(':USERNAME',$username);
        $st->bindParam(':PASSWORD',$password);
        $st->bindParam(':ROLE_ID',$role_id);
        $st->bindParam(':TOKEN',$token);
        $st->bindParam(':CREATED_AT',$created_at);
        if($st->execute()){
            return $this->conn->lastInsertId();
        }
        return false;
    }
    public function getLessonsByUserId($username){
        $st = $this->conn->prepare('SELECT ID,USERNAME,PASSWORD,ROLE_ID FROM M_USER WHERE USERNAME=:USERNAME');
        $st->bindParam(':USERNAME',$username);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
}
?>