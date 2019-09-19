<form action="completeorders.php" method="GET">
<?php

require 'includes/dbh.inc.php';

    $sql = "SELECT * FROM orders";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()){
        $orderId = $row['orderId'];
        if(!is_null($row['sentToCustomer'])){
        echo "<pre>";
        print_r($row);
        echo "</pre>";
        }
        
    }
?>
<a href="orders.php">Back to orders</a>