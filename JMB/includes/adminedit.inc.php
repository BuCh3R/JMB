<?php
require 'dbh.inc.php';

if(isset($_POST['change-item-submit'])){
    $idItem = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["idItem"]));
    $newName = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["changeName"]));
    $newPrice = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["changePrice"]));
    $newDetails = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["changeDetails"]));
    // <input type="hidden" value="'.itemId.'">
    //$sql = "UPDATE items SET itemName=?, price =?, details=? WHERE itemId=?";

    $sql = "UPDATE items SET itemName=?, price =?, details=? WHERE itemId='$idItem'";
    $stmt = mysqli_stmt_init($conn);
    if(empty($newName) || empty($newPrice) || empty($newDetails)){
        header("Location: ../adminpage.php?error=empty_fields");
        exit();
    }else if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "sss", $newName, $newPrice, $newDetails);
        mysqli_stmt_execute($stmt);
        header("Location: ../adminpage.php?item=change_complete");
        exit();
    }

    if(empty($newName)){
        header("Location: ../adminpage.php?error=empty_fields");
        exit();
    }else if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $newName);
        mysqli_stmt_execute($stmt);
        header("Location: ../adminpage.php?item=change_complete");
        exit();
    }

    
}
// if(isset($_POST['change-item-submit'])){

//     $newPrice = $_POST["changePrice"];

//     $sql = "UPDATE items SET price=? WHERE itemId=1";
//     $stmt = mysqli_stmt_init($conn);
//     if(empty($newPrice)){
//         header("Location: ../adminpage.php?error=empty_fields");
//         exit();
//     }else if(!mysqli_stmt_prepare($stmt, $sql)){
//         echo "There was an error";
//         exit();
//     }else{
//         mysqli_stmt_bind_param($stmt, "s", $newPrice);
//         mysqli_stmt_execute($stmt);
//         header("Location: ../adminpage.php?item=change_complete");
//         exit();
//     }
// }
// if(isset($_POST['change-item-submit'])){

//     $newDetails = $_POST["changeDetails"];

//     $sql = "UPDATE items SET details=? WHERE itemId=1";
//     $stmt = mysqli_stmt_init($conn);
//     if(empty($newDetails)){
//         header("Location: ../adminpage.php?error=empty_fields");
//         exit();
//     }else if(!mysqli_stmt_prepare($stmt, $sql)){
//         echo "There was an error";
//         exit();
//     }else{
//         mysqli_stmt_bind_param($stmt, "s", $newDetails);
//         mysqli_stmt_execute($stmt);
//         header("Location: ../adminpage.php?item=change_complete");
//         exit();
//     }
// }
