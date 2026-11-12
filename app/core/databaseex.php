<?php
namespace app\core;
use mysqli;
class database
{
    protected $conn;
    public function __construct()
    {
        $this->conn=new mysqli("hostname","username","password","dbname");
        if($this->conn->connect_error)
            {
                dei("Db conection failed.".$this->conn->connect_error);
            }
    }
    public function __destruct()
    {
        $this->conn->close();
    }
}
?>