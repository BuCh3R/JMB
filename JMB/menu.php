<?php
session_start();
?>
  <header>
    <nav class="navbar navbar-inverse">                
        <div>
            <?php
            // if the user is logged in //
            if(isset($_SESSION['userId'])){
                echo '<div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                  </button>
                  <a class="navbar-brand" href="#"><img src="img/LOGO2.png" alt="JMB icon"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav focus">
                    <li><a href="index.php#">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="aboutus.php">About us</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="checkout.php">Check out <span class="glyphicon glyphicon-shopping-cart"</span></a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right focus">
                  <li><form action="includes/logout.inc.php" method="post">
                  <button class="btn44 focus" type="submit" name="logout-submit"><span class="glyphicon glyphicon-log-out"></span> Logout</button></li></form>
                    <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                  </ul>
                </div>
              </div>';
              }
              else {
                // the user is not logged in //
                echo '<div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#"><img src="img/LOGO2.png" alt="JMB icon"></a>
                  </div>
                  <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav focus">
                      <li><a href="index.php#">Home</a></li>
                      <li><a href="shop.php">Shop</a></li>
                      <li><a href="aboutus.php">About us</a></li>
                      <li><a href="contact.php">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <form action="includes/login.inc.php" method="post">
                    <li><input class="login-inp" type="text" name="mailuid" placeholder="E-mail..."><input class="login-inp" type="password" name="pwd" placeholder="Password..."><button class="btn44 focus" type="submit" name="login-submit"><span class="glyphicon glyphicon-log-in"></span> Login</button><button class="btn44" type="submit"><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></button></li>
                    </form>
                    </ul>
                  </div>
                </div>';
              }
            ?>
        
        
        
        </div>
    </nav>
    
</header>

