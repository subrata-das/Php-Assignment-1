<?php
    session_start();
    $header_flag=false;
    if(isset($_SESSION["U_ID"]) && !(empty($_SESSION["U_ID"]))){
    $header_flag=true;
    require_once "./APIs/dbcon.php";
    $U_ID=$_SESSION["U_ID"];
    $sql = "SELECT `NAME`,`EMAIL` FROM USER_INFO WHERE `U_ID`='$U_ID'";
    $result=$conn->query($sql);
    $name='';
    $email='';
    foreach($result as $row){
        $name=$row['NAME'];
        $email=$row['EMAIL'];
    }
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
                            <h2>Submit a ticket</h2>
                            <div class="row">
                                <form class="" method="POST" id="newticket_form">
                                    <div class="col-md-12 row-space">
                                        <strong class="err_msg" id="newticket_name_msg"></strong>
                                        <strong>Name : </strong>
                                        <input type="text" class="form-control" id="newticket_name" name="name" value="<?php echo $name;?>" placeholder="Name">
                                    </div>
                                    <div class="col-md-12 row-space">
                                        <strong class="err_msg" id="newticket_email_msg"></strong>
                                        <strong>Email : </strong>
                                        <input type="email" class="form-control" id="newticket_email"  name="email" value="<?php echo $email; ?>"placeholder="E-mail">
                                    </div>
                                    <div class="col-md-12 row-space">
                                        <h4>Ticket Information</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <strong>Department</strong>
                                        <select class="form-control" id="newticket_dept">
                                            <option>PWSLab DevOps Support</option>
                                            <option>iSupport</option>
                                            <option>Naveena</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 row-space">
                                        <strong>Category</strong>
                                        <select class="form-control" id="newticket_category">
                                            <option>-New-</option>
                                            <option>NEW Project CI/CD Pipeline Setup</option>
                                            <option>Update CI/CD Pipeline Configuration</option>
                                            <option>DevSecOps Pipeline Setup</option>
                                            <option>CI/CD Pipeline Failure</option>
                                            <option>Automated Deployment failure</option>
                                            <option>Docker and Container</option>
                                            <option>Kubernetes Deploypents (likeEKS/GCP)</option>
                                            <option>Git Source Control</option>
                                            <option>PWSLab server not responding(502/503)</option>
                                            <option>PWSLab Runner not working(jobs not running)</option>
                                            <option>User management and Project acess</option>
                                            <option>Cloud integration Conslation- AWS/GCP/Azure</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 row-space">
                                        <strong class="err_msg" id="newticket_url_msg"></strong>
                                        <strong>PWSLab Project URL : </strong>
                                        <input type="text" class="form-control" id="newticket_url"  placeholder="https://">
                                    </div>
                                    <div class="col-md-12 row-space">
                                        <strong class="err_msg" id="newticket_subject_msg"></strong>
                                        <strong>Subject : </strong>
                                        <input type="text" class="form-control" id="newticket_subject"  placeholder="Subject">
                                    </div>
                                    <div class="col-md-12 row-space">
                                        <strong class="err_msg" id="newticket_dec_msg"></strong>
                                        <strong>Description : </strong>
                                        <textarea rows="10" class="form-control" id="newticket_dec"></textarea>
                                    </div>
                                    <div class="col-md-12 row-space">
                                        <h4>Contact Details</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <strong>Phone : </strong>
                                        <input type="text" class="form-control" id="newticket_phon"  placeholder="Phone No.">
                                    </div>
                                    <div class="col-md-12 row-space">
                                        <h4>Additional Information</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <strong>Priority : </strong>
                                        <select class="form-control" id="newticket_priority">
                                            <option>-None-</option>
                                            <option>High - ProductionSystem Down</option>
                                            <option>Medium - Production Impaired</option>
                                            <option>Low - General Guidance</option>
                                        </select>
                                    </div>
                                </form>
                                <div class="col-md-4"></div>
                                <div class="col-md-8 row-space">
                                    <!-- <input type="submit" class="btn btn-primary btn-lg btn-block"> -->
                                    <button type="button" class="btn btn-primary btn-lg btn-block" id="newticket_submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" align="center">
                        <h4> Popular Articles</h4>
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

<?php
    require_once "./APIs/dbclose.php";
    } else {
        header('Location: ./signin.php');
    }
?>