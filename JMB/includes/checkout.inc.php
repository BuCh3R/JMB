<?php
session_start();
require 'dbh.inc.php';

$userIdOrder = $_SESSION['orderId'];

if(isset($_POST['checkout-submit'])){
    
    $sqlsentPay = "UPDATE orders SET sentToPayment=0 WHERE orderId='$userIdOrder'";
    $stmtsentPay = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtsentPay, $sqlsentPay)){
        echo "There was an error";
        exit();
    }else{
        mysqli_stmt_execute($stmtsentPay);
        header("Location: ../shop.php?sent_to=payment");
        exit();
    }
}else{
    $sentPay = 1;
}

$quickpay = 0;  //need a variable from the gateway, in this case quickpay//

if($quickpay==0){
    
    $sqlPayed = "UPDATE orders SET payed=0 WHERE orderId='$userIdOrder'";
    $stmtPayed = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtPayed, $sqlPayed)){
        echo "There was an error";
        exit();
    }else{
        mysqli_stmt_execute($stmtPayed);
        header("Location: ../shop.php?sent_to=payment");
        exit();
    }
}else{
    $payed=1;
}
