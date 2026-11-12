<?php
require "vendor/autoload.php";
use app\controllers\usercontroller;

$controllerobj = new usercontroller();
$controllerobj->adduser("Mathi","mathi@gmail.com",28,"123");
$controllerobj->showuser(4);
$controllerobj->updateuser(6,"Karthick","karthi@gmail.com",28,"1234");
$controllerobj->deleteuser(12);
?>