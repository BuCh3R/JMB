<?php
require 'includes/dbh.inc.php';
date_default_timezone_set('Europe/Copenhagen');

if(isset($_GET['action'])){
    if($_GET['action'] == 'send'){
        
        $orderValue = $_GET['orderid'];
        $date = date('Y-m-d H:i:s');
    
        $sql = "UPDATE orders SET sentToCustomer='$date' WHERE orderId=$orderValue AND sentToCustomer is NULL";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "There was an error";
        }else{
            mysqli_stmt_execute($stmt);
        }
    }
        
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
    <title>JMB | Orders</title>
</head>
<body>
    <form action="includes/orders.inc.php" method="POST">
        <button type="submit" name="sent-to-cus">send package</button>
    </form>

<form action="orders.php" method="GET">



    <?php

    $sql = "SELECT * FROM orders WHERE payed=1";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()){
        $orderId = $row['orderId'];
        if(is_null($row['sentToCustomer'])){
            echo "<a href='orders.php?action=send&orderid=$orderId'>send</a>";
        }
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
    
    ?>
    
    
    </form>
    <button><a href="adminpage.php">back to crud</a></button>
    <a href="completeorders.php">completede orders</a>
</body>
</html>