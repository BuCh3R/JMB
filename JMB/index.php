<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'head.php'; ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="fpanimation.js"></script>
  <title>JMB | Forside</title>
</head>
<body>
<?php include 'menu.php'; ?>
<!-- frontpage banner -->
<div class="jumbotron text-center bg-color">
  <h1><img src="img/LOGO1.png" alt="JMB Logo"></h1>
  <p>Lost items. A thing of the past.</p> 
</div>


  

<!-- the 3 frontpage division that is animated down on width 1600+px -->

<div class="whitedivs-container lmaomid justify-content-between">
  <div class="col-sm-4">
  <div id="news1">
    <span><h2>Latest gadgets</h2><p>
    We always try to expand our product variety for your needs. Making sure we have the latest technologies available to you. We have recently gotten requests on a gps tracker device. The tracker fits perfectly in your key chain or in a dog collar. This device makes it possible to keep track of whatever you usually frequintly lose, we have all tried reaching in our pockets only to find out there were no keys.<a href="shop.php"><img src="img/fakegpspic.png" alt="gps tracker keychain"><img src="img/fakegpspic.png" alt="gps tracker keychain"></a>
    </p></span>
</div>
  </div>
  <div class="col-sm-4">
  <div id="news2">
    <span><h2>Customer support</h2>
  <p>At JMB we prioritize our customers, and we will personally take care of what you need. Our goal is to make your visit as convenient as possible. This we would like to think is achieved by, having everything with only a few clicks away. If it should happen that you would run in to a problem, we will be here to assist you all the way through. Questions? Please contact us <a href="contact.php">here</a> or for an immediate answer try calling us on the number on the botton of the page. <img src="img/service.png" alt="service check"> </p></span>
</div>
  </div>
  <div class="col-sm-4">
  <div id="news3">
    <span><h2>Easy to use</h2><p>
    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&mute=1&controls=1" frameborder="0"></iframe>
    Our gps tracker is every easy to use. Download the application on your smartphone, open it. Insert the serial number on your gps tracker into the application and click "search". You should now have your smartphone connected with the device and will be able to track it directly from your phone.
    </p></span>
</div>
  </div>

</div>

<!-- the 3 frontpage division width less than 1600px width -->
<div class="container-fluid not-displayed">
<div class="row">
    <div class="col-sm-3 bg-light nyhedermobil1">
    <span><h2>Latest gadgets</h2><p>
    We always try to expand our product variety for your needs. Making sure we have the latest technologies available to you. We have recently gotten requests on a gps tracker device. The tracker fits perfectly in your key chain or in a dog collar. This device makes it possible to keep track of whatever you usually frequintly lose, we have all tried reaching in our pockets only to find out there were no keys... Wait no more, the GPS 2300 v2.01(device name) will prevent you from losing valuable items in the future. <a href="shop.php"><img src="img/fakegpspic.png" alt="gps tracker keychain"><img src="img/fakegpspic.png" alt="gps tracker keychain"></a>
    </div>
    <div class="col-sm-3 bg-light nyhedermobil2">
    <span><h2>Customer support</h2>
    <p>At JMB we prioritize our customers, and we will personally take care of what you need. Our goal is to make your visit as convenient as possible. This we would like to think is achieved by, having everything with only a few clicks away. If it should happen that you would run in to a problem, we will be here to assist you all the way through. Questions? Please contact us <a href="contact.php">here</a> or for an immediate answer try calling us on the number on the botton of the page. <img src="img/service.png" alt="service check"></p></span>
    </div>
    <div class="col-sm-3 bg-light nyhedermobil3">
    <span><h2>Easy to use</h2><p>
    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&mute=1" frameborder="0"></iframe>
    Our gps tracker is every easy to use. Download the application on your smartphone, open it. Insert the serial number on your gps tracker into the application and click "search". You should now have your smartphone connected with the device and will be able to track it directly from your phone.
    </p></span>
    </div>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>