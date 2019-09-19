<?php
session_start();
date_default_timezone_set('Europe/Copenhagen');

if(isset($_POST['sent-to-cus'])){
    require 'dbh.inc.php';

    $userId = $_SESSION['userId'];
    $date = date('Y-m-d H:i:s');

    // need variable to confirm which order is sent //
    $sql = "UPDATE orders SET sentToCustomer='$date' WHERE userId=2";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error";
        exit();
    }else{
        mysqli_stmt_execute($stmt);
        header("Location: ../orders.php?sent_to=customer");
        exit();
    }
    echo "<input class='bold' type='text' name='date' value='".date('Y-m-d H:i:s')."'>";
}