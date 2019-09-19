<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "jmb_database";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if(!$conn){
    die("connection failed: ".mysqli_connect_error());
}
?>