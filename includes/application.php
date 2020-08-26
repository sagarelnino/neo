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
        $st = $this->conn->prepare('SELECT * FROM M_USER WHERE USERNAME=:username');
        $st->bindParam(':username',$username);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
}
?>