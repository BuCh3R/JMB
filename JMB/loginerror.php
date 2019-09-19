
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>    
    <title>JMB | Login</title>
</head>
<body>
    <?php include 'menu.php'; ?>
<div class="col-md-2 col-md-offset-5 whiteboard">
    <form action="includes/login.inc.php" method="post">
        <input class="form-control" type="text" name="mailuid" placeholder="E-mail...">
        <br>
        <input class="form-control" type="password" name="pwd" placeholder="Password...">
        <br>
        <button class="length50 btn btn-default float-left" type="submit" name="login-submit">Login</button>        
        </form>
        <button class="length50 btn btn-default float-right" type="submit" name="login-submit"><a class="nodec" href="signup.php">Sign Up</a></button>
        <a href="reset-password.php">Forgot password?</a> 
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>