<?php

//create connection 

$dsn ="localhost";
$user="root";
$pass="";
$db="quizzer";

$conn = new mysqli($dsn,$user,$pass,$db);

if($conn->connect_error){
    echo("Faild To connect to DataBase");
    exit();
}
 ?>