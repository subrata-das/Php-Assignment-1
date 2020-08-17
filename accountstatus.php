<?php
// session_start();
$header_flag=false;

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
                    <div class="col-md-12">
                        <div class="left-col">
                            <!-- <h2>Account Status </h2> -->
                            <div class="div-success" align="center">
                                <h2>Account Status </h2>
                                <div class="alert alert-success" align="left">
                                    <h2>Well Done !</h2>
                                    <hr/>
                                    <p>* Your account created successfully ...</p>
                                    <p>* Getting Access your account you have to use provided <strong>E-MAIL*</strong> and <strong>PASSWORD*</strong> .</p>
                                </div>
                                <a href="./signin.php"><button type="button" class="btn btn-primary">Ok</button></a>
                            </div>
                        </div>
                    </div>                         
                </div>
            </div>
        </section>
    </div>

    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>
