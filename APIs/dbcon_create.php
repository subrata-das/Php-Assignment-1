<?php

header("content-type: application/json");
header("cache-control: no-cache");

$data = json_decode(file_get_contents("php://input"), true);


$server_name=$data['server_name'];
$user_name=$data['user_name'];
$password=$data['password'];
$db_name=$data['db_name'];

$msg ='';
$conn=new mysqli($server_name,$user_name,$password);
if($conn->connect_error){
    $msg = "Error Server Connection : ".$conn->connect_error;
} else {
    // create Databade
    $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
    if($conn->query($sql)){
        $conn->close();
        // $conn=new mysqli($server_name,$user_name,$password,$db_name);
        $msg = true;
    } else {
        $msg = "Error Creating Database : ".$comm->error;
    }
}

echo json_encode($msg);
?>