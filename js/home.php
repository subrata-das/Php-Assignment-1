<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <!-- hreader -->
        <?php
            require_once "./layout/header.php";
            // var_dump($_SESSION);
        ?>
        <!-- body -->
        <section class="">
            <div class="container">
                <div class="row">
                    
                </div>
            </div>
        </section>
    </div>

    <script src="./js/jquery-3.5.1.min.js"></script>
    <!-- <script src=./popper/popper.min.js"></script> -->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>