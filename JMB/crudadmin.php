<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
    <title>JMB | Admin login</title>
</head>
<body>
    <?php include 'menu.php'; ?>
<?php
if(isset($_SESSION['userUid'])){
    echo '';
}else{
    echo '<form action="includes/crudadmin.inc.php" method="post">
    <input type="text" name="unid" placeholder="Username...">
    <input type="password" name="crudpwd" placeholder="Password...">
    <button type="submit" method="post" name="admin-login-submit">Login</button>
    </form>';
}
?>

    
<?php include 'footer.php'; ?>
</body>
</html>