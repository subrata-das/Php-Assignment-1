<?php
session_start();
$header_flag=false;
if(isset($_SESSION["U_ID"]) && !(empty($_SESSION["U_ID"]))){
    $header_flag=true;
    $url = 'https://desk.zoho.com/api/v1/tickets?include=team';
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
            "orgId : ",  //required
            "Authorization : " //required
        ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="body-container">
        <!-- hreader -->
        <?php
            require_once "./layout/header.php";
            // var_dump($_SESSION);
        ?>
        <!-- body -->
        <section class="section-body">
            <div class="container">
                <div class="row">
                    <?php
                        if($err){
                            // header("location:login.php");
                    ?>
                        <div class="col-md-8">
                            <div class="left-col">
                                <h2>Something went wrong ....</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                    <?php
                        } else {
                            $db_responce= json_decode($response);
                            var_dump($db_responce);     // responce report
                    ?>
                        <div class="col-md-8">
                            <div class="left-col">
                                <h2></h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        <?php }  ?>
                </div>
            </div>
        </section>
    </div>

    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>
<?php
} else {
    header('Location: ./signin.php');
}
?>