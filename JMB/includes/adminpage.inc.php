<?php
if(isset($_POST['submit-item'])){
    require 'dbh.inc.php';

    $itemname = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['itemname']));
    $itemprice = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['itemprice']));
    $itemdetails = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['itemdetails']));

    if(empty($itemname) || empty($itemprice) || empty($itemdetails)){
        header("Location: ../adminpage.php?error=empty_fields");
        exit();
    }
    else if(!filter_var($itemname) && !preg_match("/^[a-zA-Z0-9]*$/", $itemname)){
        header("Location: ../adminpage.php?error=invalid_itemname");
        exit();
    }else{
        $sql = "SELECT * FROM items WHERE itemName='$itemname'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
       // make new function inside the below if statement to replace an item //
        if ($resultCheck > 0) {
        header("Location: ../adminpage.php?error=item_exist");
        exit();
        } 
       
        else {

            $sql = "INSERT INTO items (itemName, price, details) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../adminpage.php?error=sqlerror_no_database_con");
                exit(); 
            }
            else{
                mysqli_stmt_bind_param($stmt, "sss", $itemname, $itemprice, $itemdetails);
                mysqli_stmt_execute($stmt);
                header("Location: ../adminpage.php?item=succes");
                exit();
            }
        }
       }
    }else {
        header("Location: ../adminpage.php");
        exit();

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
