<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php'; ?>
</head>
<body>
    <?php include 'menu.php'; ?>
    <main>
        <div class="borderred">
        <?php
        if (isset($_GET['error'])){
            if($_GET['error'] == "empty_fields"){
                echo '<p class="errormsg-text">Fill in all the fields please</p>';
            }
            else if ($_GET['error'] == "emailexist"){
                echo '<p class="errormsg-text">The E-mail has already been used</p>';
            }
            else if ($_GET['error'] == "invalidusernamesymbol"){
                echo '<p class="errormsg-text">Invalid name, only characters allowed</p>';
            }
            else if ($_GET['error'] == "invalid_mail2"){
                echo '<p class="errormsg-text">Invalid E-mail</p>';
            }
            else if ($_GET['error'] == "password_check"){
                echo '<p class="errormsg-text">Your passwords do not match</p>';
            }
            
        }
        
        ?>
    </div>

    
        <div class="col-md-2 col-md-offset-5 whiteboard">
        <form action="includes/signup.inc.php" method="post">
        <input class="form-control" type="text" name="firstn" placeholder="First name">
        <br>
        <input class="form-control" type="text" name="lastn" placeholder="Last name">
        <br>
        <input class="form-control" type="text" name="mail" placeholder="E-mail">
        <br>
        <input class="form-control" type="password" name="pwd" placeholder="Password">
        <br>
        <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat password">
        <br>
        <input class="form-control" type="text" name="address" placeholder="Address">
        <br>
        <input class="form-control" type="text" name="zip" placeholder="Zip code">
        <br>
        <button class="length50 btn btn-default" type="submit" name="signup-submit">Create</button>
        </form>
        <form action="index.php">
            <button class="length50 nodec btn btn-default" type="submit" name="signup-cancel">Cancel</button>
        </form>
        
        
        </div>

        
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
        