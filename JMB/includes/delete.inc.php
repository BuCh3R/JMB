<?php
require 'dbh.inc.php';

if(isset($_POST['delete-submit'])){

    $itemIdDiv = $_POST['delete-item-id'];

    $sql = "UPDATE items SET display=1 WHERE itemId=$itemIdDiv";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error";
        exit();
    }else{
        mysqli_stmt_execute($stmt);
        header("Location: ../adminpage.php?deleted=success");
        exit();
    }
}else if(isset($_POST['restore-submit'])){

    $itemIdDiv = $_POST['delete-item-id'];

    $sql = "UPDATE items SET display=0 WHERE itemId=$itemIdDiv";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error";
        exit();
    }else{
        mysqli_stmt_execute($stmt);
        header("Location: ../adminpage.php?restored=success");
        exit();
    }
}


