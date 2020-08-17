<?php
session_start();

$responce;
if($_POST){
    include "./dbcon.php";
    $email=$_POST["email"];
    $password=$_POST["password"];

    $psw_str=$email.$password;

    if(!empty($email) && !empty($password)) {
        $sql=" SELECT `U_ID`,`PASSWORD` FROM `USER_INFO` WHERE `EMAIL`='$email'";
        $result=$conn->query($sql);
        if($result) {
            if($result->num_rows > 0) {
                $return='';
                $U_UD='';
                foreach($result as $data) {
                    $U_UD=$data["U_ID"];
                    $row_psw=$data["PASSWORD"];
                }
                if(password_verify($psw_str,$row_psw)){
                    $_SESSION['U_ID']=$U_UD;
                    $url= "./home.php";
                    $responce=array("status"=>"true", "msg"=>"Sign In successful ...","url"=>$url);
                    // echo "true";
                } else {
                    $responce=array("status"=>"false","msg"=>"Incorrect Password !!!");
                    // echo "Incorrect Password !!!";
                }
            } else {
                $responce=array("status"=>"false","msg"=>"E-mail not Exist !!!");
                // echo "E-mail not Exist !!!";
            }
        } else {
            $responce=array("status"=>"false","msg"=>"Data Error Occured !!!");
            // echo "Data Error Occured !!!";
        }
    } else {
        $responce=array("status"=>"false","msg"=>"Unexpected Error !!!");
        // echo "Unexpected Error !!!";
    }

include "./dbclose.php";
}

echo json_encode($responce);

?>