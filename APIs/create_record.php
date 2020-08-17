<?php
session_start();

$responce_return;

if($_POST){

    include "./dbcon.php";
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $c_password=$_POST["c_password"];

    if(!empty($email) && !empty($password) && $password === $c_password) {
        $r_flag = false;
        $t_flag = false;
        $sql=" SELECT `U_ID` FROM `USER_INFO` WHERE `EMAIL`='$email'";
        $result=$conn->query($sql);
        if($result){
            if($result->num_rows === 0 ){
                $r_flag = true;
            } else {
                $responce_return=array("status"=>"false", "msg"=>"Email Already Exist!!!");
            }
        } else {
            $url = $_SERVER['SERVER_NAME'].'/Assignment/APIs/create_table.php';
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
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
                $t_flag=$db_responce;
            }
        }
        if($r_flag || $t_flag){
            $psw_str=$email.$password;
            $h_password=password_hash($psw_str, PASSWORD_BCRYPT);

            $sql = "INSERT INTO `USER_INFO`(`U_ID`,`NAME`,`EMAIL`,`PASSWORD`) VALUES (UUID(),'$name','$email','$h_password')";
            if($conn->query($sql)){
                $url= "./accountstatus.php";
                $responce_return=array("status"=>"true", "msg"=>"Sign Up successfull ...","url"=>$url);
                // echo "true";
            } else {
                $responce_return=array("status"=>"false", "msg"=>"Record not created !!!");
                // echo "Record not created";
            } 
        }
    } else {
        $responce_return=array("status"=>"", "msg"=>"Unexpected Error !!!");
        // echo "Unexpected Error !!!";
    }
    include "./dbclose.php";
}



echo json_encode($responce_return);



?>
