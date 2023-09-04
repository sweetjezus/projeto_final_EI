<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "EqsDB";


$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn){
    die("Failed:".mysqli_connect_error());
}

