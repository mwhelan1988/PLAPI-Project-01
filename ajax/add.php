<?php
require_once("../conn.php");

$make = $_POST["make"];
$model =  $_POST["model"];
$year =  $_POST["year"];
$nickname =  $_POST["nickname"];

$add = "INSERT INTO cars (make, model, year, nickname)
VALUES ('$make', '$model', '$year', '$nickname')";

if($db->query($add)){
    echo 'success';
}

?>