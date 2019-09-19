<?php
session_start();
require 'dbh.inc.php';

if(isset($_POST['user-itemremove'])){
    if(isset($_SESSION['orderId'])){
        // check if works when button click and session = orderId //
        // header("Location: ../checkout.php");
        // exit();
        $sql = "DELETE FROM orderdetails WHERE orderDetailId = 65";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "There was an error";
            exit();
        }else{
            mysqli_stmt_execute($stmt);
            header("Location: ../index.php?deleted=success");
            exit();
        }        
    }
}