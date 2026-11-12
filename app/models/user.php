<?php
namespace app\models;
use app\core\database;
use app\core\loggertrait;
use app\interfaces\crudinterface;

class user extends database implements crudinterface
{
    use loggertrait;
    public function create($data)
    {
         $stmt=$this->conn->prepare("INSERT INTO users(name,email,age,password) VALUES(?,?,?,?)");
         $stmt->bind_param("ssis",$data["name"],$data["email"],$data["age"],$data["password"]);
         $stmt->execute();
         $this->log("User ".$data["name"]." Created.");
    }
    public function read($id)
    {
        $stmt=$this->conn->prepare("SELECT * FROM users WHERE id=?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $res= $stmt->get_result();
        return $res->fetch_assoc();
    }
    public function update($id,$data)
    {
        $stmt=$this->conn->prepare("UPDATE users SET name=?,email=?,age=?,password=? WHERE id=?");
        $stmt->bind_param("ssisi",$data["name"],$data["email"],$data["age"],$data["password"],$id);
        $stmt->execute();
        $this->log("User id ".$id." Updated.");
    }
    public function delete($id)
    {
        $stmt=$this->conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $this->log("User id ".$id." Deleted.");
    }
}
?>