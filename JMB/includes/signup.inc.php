<?php
if(isset($_POST['signup-submit'])){

    require 'dbh.inc.php';

    $firstname = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['firstn']));
    $lastname = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['lastn']));
    $email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['mail']));
    $password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['pwd']));
    $passwordrepeat = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['pwd-repeat']));
    $address = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['address']));
    $zipcode = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['zip']));

    if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($passwordrepeat) || empty($address) || empty($zipcode)){
        header("Location: ../signup.php?error=empty_fields&uid=".$firstname."&mail=".$email);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $firstname)){
        header("Location: ../signup.php?error=invalid_uid_mail");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalid_mail2&uid=".$firstname);
        exit();  
    }
    else if (!preg_match("/^[a-zA-Z0-9+æøå+ÆØÅ]*$/", $firstname)) {
        header("Location: ../signup.php?error=invalidusernamesymbol");
        exit();  
    }
    else if ($password !== $passwordrepeat) {
        header("Location: ../signup.php?error=password_check&uid=".$firstname."&mail=".$email);
        exit();
    }
    //////////-------------- cant have users with identical names ---------------////////////////
    // else{
    //     $sql = "SELECT * FROM users WHERE uidUsers='$username'";
    //         $result = mysqli_query($conn, $sql);
    //         $resultCheck = mysqli_num_rows($result);
           
    //         if ($resultCheck > 0) {
    //         header("Location: ../signup.php?error=userexist");
    //         exit();
   
    //     }
        else{
            $sql = "SELECT * FROM bruger WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
           
            if ($resultCheck > 0) {
            header("Location: ../signup.php?error=emailexist");
            exit();
            } 
           
            else {

                $sql = "INSERT INTO bruger (firstName, lastName, email, pwdUsers, userAddress, zipCode) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit(); 
                }
                else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $email, $hashedPwd, $address, $zipcode);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?success");
                    exit();
                }
            }
           }
        }else {
            header("Location: ../signup.php");
            exit();
    
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
    