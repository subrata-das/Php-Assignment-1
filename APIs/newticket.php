<?php
session_start();
if(isset($_SESSION["U_ID"]) && !empty($_SESSION["U_ID"])){
    include "./dbcon.php";

    if($_POST){
        $name=$_POST["name"];
        $email=$_POST["email"]; 
        $dept=$_POST["dept"];   // this variable not holding  department id.
        $category=$_POST["category"];
        $url=$_POST["url"];
        $subject=$_POST["subject"]; 
        $desc=$_POST["desc"]; 
        $phone=$_POST["phone"]; 
        $priority=$_POST["priority"]; 
        
        $data=array(
                "subCategory" => "",
                "cf" => "",
                "productId" => "",
                "contactId" => "",
                "subject" => $subject,
                "dueDate" => "",
                "departmentId" => "", // required for  departtment.s
                "channel" => "Email",
                "description" => $desc,
                "priority" => $priority,
                "classification" => "",
                "assigneeId" => "",
                "phone" => $phone,
                "category" => $category,
                "email" => $email,
                "status" => "");

        $url = 'https://desk.zoho.com/api/v1/tickets';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "orgId : "  ,        // required
                "Authorization : "  // required
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);

        $return_report=[];
        if($err){
            $return_report=array("status"=>"true","msg"=>$err);
        } else {
            $db_response = json_decode($response);
            $return_report=array("status"=>"false", "msg"=>$db_response);
        }
        echo json_encode($return_report);
    }

    include "./dbclose.php";
}


?>