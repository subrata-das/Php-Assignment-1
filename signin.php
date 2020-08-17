<?php
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
                    <div class="col-md-8">
                        <div class="left-col">
                            <h2>Sign In</h2>
                            <div id="signin_msg">
                                <!-- <div class="alert alert-success">asdfghj</div> -->
                            </div>
                            <div class="row">
                                <form class="" method="POST" id="signin_form">
                                    <div class="col-md-12 row-space">
                                        <strong class="err_msg" id="signin_email_msg"></strong>
                                        <strong>Email : </strong>
                                        <input type="email" class="form-control"id="signin_email"  name="email" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-12 row-space">
                                        <strong class="err_msg" id="signin_psw_msg"></strong>
                                        <strong>Password : </strong>
                                        <input type="password" class="form-control"id="signin_psw"  name="password" placeholder="********">
                                    </div>
                                </form>
                                <div class="col-md-4"></div>
                                <div class="col-md-8 row-space">
                                    <!-- <input type="submit" class="btn btn-primary btn-lg btn-block"> -->
                                    <button type="button" class="btn btn-primary btn-lg btn-block" id="signin_submit">Sign In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        Atricals
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