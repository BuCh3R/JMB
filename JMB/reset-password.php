<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
    <title>JMB | Reset password</title>
</head>

<body>
<?php include 'menu.php'; ?>
<div class="col-md-2 col-md-offset-5 whiteboard pos-top">
<h3>Reset your password</h3>
<?php
if(isset($_GET["reset"])){
    if ($_GET["reset"] == "succes") {
        echo '<h4>Check your email!</h4>';
    }
}
?>
<form action="includes/reset-request.inc.php" method="post">
        <input class="form-control" type="text" name="email" placeholder="Enter your email adress...">
        <br>
        <button class="length50 btn btn-default float-left" type="submit" name="reset-request-submit">Send</button>        
        </form>
        <button class="length50 btn btn-default float-right" type="submit" name="login-submit"><a class="nodec" href="signup.php">Sign Up</a></button>
        <p>If you did not receive an email within 5-10 minutes, please contact us and we will try to assist you as soon as possible <a href="contact.php">Contact</a>.</p>
    </div>

    <?php include 'footer.php'; ?> 
</body>
</html>

