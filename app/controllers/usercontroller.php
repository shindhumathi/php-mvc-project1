<?php
namespace app\controllers;
use app\models\user;

class usercontroller
{
    private $user;
    public function __construct()
    {
        $this->user=new user();
    }
    public function adduser($name,$email,$age,$password)
    {
        $this->user->create(["name"=>$name,"email"=>$email,"age"=>$age,"password"=>$password]);
    }
    public function showuser($id)
    {
        $data=$this->user->read($id);
        if($data)
            {
                echo $data["name"] ." - ".$data["email"]."<br>";
            }
        else
            {
                echo "User not found.";
            }
    }
    public function updateuser($id,$name,$email,$age,$password)
    {
        $this->user->update($id,["name"=>$name,"email"=>$email,"age"=>$age,"password"=>$password]);
    }
    public function deleteuser($id)
    {
        $this->user->delete($id);
    }
}
?>