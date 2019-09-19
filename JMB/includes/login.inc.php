<?php

if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';

    $mailuid = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['mailuid']));
    $password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['pwd']));

    if(empty($mailuid) || empty($password)){
        header("Location: ../loginerror.php?error=empty_fields");
        exit();
    }
    else {
        $sql = "SELECT * FROM bruger WHERE email=? OR firstName=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../loginerror.php?error=sql_error");
            exit(); 
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $password);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($results)){
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if($pwdCheck == false){
                    header("Location: ../loginerror.php?error=wrong_pwd");
                    exit();
                }
                else if ($pwdCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['userId'];
                    $_SESSION['userName'] = $row['firstName'];
                    
                    header("Location: ../index.php?login=succes");
                    exit();
                }
                else{
                    header("Location: ../loginerror.php?error=wrong_pwd");
                    exit();
                }
            }
            else {
                header("Location: ../loginerror.php?error=nouser");
                exit();
            }
        }
    }

}
else {
    header("Location: ../index.php");
}