<?php
require 'index.php';


    if(isset($_SESSION['userId'])){
        echo '';
        }else{  
        echo '<form action="includes/login.inc.php" method="post">
        <input type="text" name="mailuid" placeholder="E-mail...">
        <input type="password" name="pwd" placeholder="Password...">
        <button type="submit" name="login-submit">Login</button>
        </form>';
        } 
