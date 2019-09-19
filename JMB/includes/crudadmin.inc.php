<?php
if(isset($_POST['admin-login-submit'])){
    require 'dbh.inc.php';

    $usernameid = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['unid']));
    $password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['crudpwd']));
    
    if(empty($usernameid) || empty($password)){
        header("Location: ../crudadmin.php?error=empty_fields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../crudadmin.php?error=sql_error");
            exit(); 
    }else {
        mysqli_stmt_bind_param($stmt, "s", $usernameid);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($results)){
            $pwdCheck = password_verify($password, $row['pwdUsers']);
            if($pwdCheck == false){
                header("Location: ../crudadmin.php?error=wrong_pwd");
                exit();
            }
            else if ($pwdCheck == true){
                session_start();
                $_SESSION['userId'] = $row['idUsers'];
                $_SESSION['userUid'] = $row['uidUsers'];
                
                header("Location: ../adminpage.php?login=succes");
                exit();
            }else{
                header("Location: ../crudadmin.php?error=wrong_pwd");
                exit();
            }
        }else {
            header("Location: ../loginerror.php?error=nouser");
            exit();
        }
    }
}
}else {
    header("Location: ../index.php");
}





// if(isset($_POST['admin-login-submit'])){

//     require 'dbh.inc.php';

//     $mailuid = $_POST['mailuid'];
//     $password = $_POST['pwd'];

//     if(empty($mailuid) || empty($password)){
//         header("Location: ../loginerror.php?error=empty_fields");
//         exit();
//     }
//     else {
//         $sql = "SELECT * FROM users WHERE uidUsers=?;";
//         $stmt = mysqli_stmt_init($conn);
//         if(!mysqli_stmt_prepare($stmt, $sql)){
//             header("Location: ../loginerror.php?error=sql_error");
//             exit(); 
//         }
//         else {
//             mysqli_stmt_bind_param($stmt, "s", $mailuid);
//             mysqli_stmt_execute($stmt);
//             $results = mysqli_stmt_get_result($stmt);
//             if ($row = mysqli_fetch_assoc($results)){
//                 $pwdCheck = password_verify($password, $row['pwdUsers']);
//                 if($pwdCheck == false){
//                     header("Location: ../loginerror.php?error=wrong_pwd");
//                     exit();
//                 }
//                 else if ($pwdCheck == true){
//                     session_start();
//                     $_SESSION['userId'] = $row['idUsers'];
//                     $_SESSION['userUid'] = $row['uidUsers'];
                    
//                     header("Location: ../index.php?login=succes");
//                     exit();
//                 }
//                 else{
//                     header("Location: ../loginerror.php?error=wrong_pwd");
//                     exit();
//                 }
//             }
//             else {
//                 header("Location: ../loginerror.php?error=nouser");
//                 exit();
//             }
//         }
//     }

// }
// else {
//     header("Location: ../index.php");
// }