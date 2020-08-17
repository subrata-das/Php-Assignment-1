<?php

header("content-type: application/json");
header("cache-control: no-cache");


include "./dbcon.php";
$msg=false;
$sql="CREATE TABLE IF NOT EXISTS `USER_INFO`(
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `U_ID` VARCHAR(100) NOT NULL,
        `NAME` VARCHAR(255) NOT NULL,
        `EMAIL` VARCHAR(255) NOT NULL,
        `PASSWORD` VARCHAR(255) NOT NULL,
        `CREATED_AT` TIMESTAMP NOT NULL,
        `DELETED_AT` TIMESTAMP NULL,
        PRIMARY KEY (ID))";

if($conn->query($sql)){

    $msg=true;
}

echo json_encode($msg);

include "./dbclose.php";

?>