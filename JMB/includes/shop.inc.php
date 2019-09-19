<?php
session_start();
require 'dbh.inc.php';





if(isset($_POST['inset-order'])){

    

    // $orderNumber = $_POST['orderId'];
    // $itemNumber = $_POST['itemId'];
    $userId = $_SESSION['userId'];
    $sentPay= 1;
    $payed = 1;

    


        if(isset($_SESSION['userId'])){
            $sql = "SELECT * FROM bruger";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck < 1) {
                header("Location: ../shop.php?error=need_login");
                exit();
            }else{
                $sql = "INSERT INTO orders (userId, sentToPayment, payed) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../shop.php?error=sqlerror");
                    exit();
                }else{
                    mysqli_stmt_bind_param($stmt, "sss", $userId, $sentPay, $payed);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../shop.php?order_start=success");
                    exit();
                    } 
                }
        }else{
            header("Location: ../loginerror.php?login=required");
            exit();
        }
        
    
}


if(isset($_POST['item-to-carts'])){
    if(isset($_SESSION['userId'])){

        $userId = $_SESSION['userId'];
        $sentPay= 1;
        $payed = 1;


        if(!isset($_SESSION['orderId'])){
            $sql = "INSERT INTO orders (userId, sentToPayment, payed) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../shop.php?error=sqlerror");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "sss", $userId, $sentPay, $payed);
                mysqli_stmt_execute($stmt);
                $_SESSION['orderId']=mysqli_insert_id($conn);
                // header("Location: ../shop.php?order_start=success");
                // exit();
                } 
        }
        $idOrder = $_SESSION['orderId'];
        $itemNumber = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['itemId']));
        $userId = $_SESSION['userId'];
   
        // $tutut = "SELECT * FROM orders WHERE orderId=$idOrder";
        // $returns = mysqli_query($conn, $tutut);
        // $row = $returns->fetch_assoc();
        // $orderIddd = $row['orderId'];

        // $sql = "SELECT * FROM items";
        // $result = mysqli_query($conn, $sql);
        // $resultCheck = mysqli_num_rows($result);
        // if($resultCheck < 1) {
        //     header("Location: ../shop.php?error=need_login");
        //     exit();
        // }else{
            $sql2 = "INSERT INTO orderDetails (orderId, itemId) VALUES (?, ?)";
            $stmt2 = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt2, $sql2)) {
                header("Location: ../shop.php?error=sqlerror");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt2, "ss", $idOrder, $itemNumber);
                mysqli_stmt_execute($stmt2);
                header("Location: ../checkout.php?cart_item_added=success");
                exit();
                } 
            
        }else{
            header("Location: ../loginerror.php?login=required");
            exit();
        }
    
    }else{
        header("Location: ../loginerror.php?login=required");
        exit();
}


                
        
        

    
       

    // $idOrder = $row['orderId'];
    // $itemNumber = $_POST['itemId'];
    

    // if(isset($_SESSION['userId'])){
    //     $sql = "SELECT * FROM items";
    //     $result = mysqli_query($conn, $sql);
    //     $resultCheck = mysqli_num_rows($result);
    //     if($resultCheck < 1) {
    //         header("Location: ../shop.php?error=need_login");
    //         exit();
    //     }else{
    //         $sql2 = "INSERT INTO orderDetails (orderId, itemId) VALUES (?, ?)";
    //         $stmt2 = mysqli_stmt_init($conn);
    //         if(!mysqli_stmt_prepare($stmt2, $sql2)) {
    //             header("Location: ../shop.php?error=sqlerror");
    //             exit();
    //         }else{
    //             mysqli_stmt_bind_param($stmt2, "ss", $idOrder, $itemNumber);
    //             mysqli_stmt_execute($stmt2);
    //             header("Location: ../shop.php?cart_item_added=success");
    //             exit();
    //             } 
    //         }
    // }else{
    //     header("Location: ../loginerror.php?login=required");
    //     exit();
    // }



// $sql3 = "SELECT * FROM orders";
// $result3 = mysqli_query($conn, $sql3);
// $resultCheck3 = mysqli_num_rows($result3);
// if ($resultCheck3 < 1) {
//     header("Location: ../shop.php?error=need_login");
//     exit();
// }else{
//     $sql2 = "INSERT INTO orderDetails (orderId, itemId) VALUES (?, ?)";
//     $stmt2 = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt2, $sql2)) {
//         header("Location: ../shop.php?error=sqlerror");
//         exit();
//     }else{
//         mysqli_stmt_bind_param($stmt2, "ss", $orderNumber, $itemNumber);
//         mysqli_stmt_execute($stmt2);
//         header("Location: ../shop.php?cart_item_added=success");
//         exit();
//         } 
//     }
    
        
