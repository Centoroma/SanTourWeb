<?php
namespace ResaBike\Library\Entity;

use ResaBike\Library\Database\DbConnect;
use \PDO;
class Track{
    var $conn;
    public function __construct(){
        $this->conn=DbConnect::Get('Connection');
    }
    public function addZone($name){
        $conn = $this->conn;
        $sql="INSERT INTO zone(name) VALUES (:name)";
        $stat = $conn->prepare($sql);
        $stat->bindParam(":name",$name);
        $stat->execute();
        return $conn->lastInsertId();
    }
    public function updateZone($id,$name){
        $conn = $this->conn;
        $sql="UPDATE zone SET name=:name WHERE id=:id";
        $stat = $conn->prepare($sql);
        $stat->bindParam(":id",$id);$stat->bindParam(":name",$name);
        $stat->execute();
    }
    public function deleteZone($id){
        $conn = $this->conn;
        $sql="DELETE FROM zone WHERE id=:id";
        $stat = $conn->prepare($sql);
        $stat->bindParam(":id",$id);
        $stat->execute();
    }
    public function getAllZone(){
        $conn = $this->conn;
        $sql="SELECT * FROM zone";
        return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getZoneById($id){
        $conn = $this->conn;
        $sql="SELECT * FROM zone WHERE id=:id";
        $stat = $conn->prepare($sql);
        $stat->bindParam(":id",$id);
        $stat->execute();
        return $stat->fetch(PDO::FETCH_LAZY);
    }
}
?>