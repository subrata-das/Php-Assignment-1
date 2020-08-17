<?php
error_reporting('E_ERROR');

$server_name="localhost";
$user_name="root";
$password="";
$db_name="demo_test";


$conn=new mysqli($server_name,$user_name,$password,$db_name);

if($conn->connect_error){
    // echo "Error Server Connection : ".$conn->connect_error;
    $data = array("server_name"=>$server_name,
                "user_name"=>$user_name,
                "password"=>$password,
                "db_name"=>$db_name);
                
    $url = $_SERVER['SERVER_NAME'].'/Assignment/APIs/dbcon_create.php';
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
          "content-type: application/json",
          "x-requested-with: XMLHttpRequest"
        ),
      ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);

    if($err){
        header("location:login.php");
    } else {
        $db_responce= json_decode($response);
    }

    if($db_responce){
        $conn=new mysqli($server_name,$user_name,$password,$db_name);
    } else {
        echo $db_responce;
    }
}

?>