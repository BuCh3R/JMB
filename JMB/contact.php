<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php'; ?>
    <script src="googlemaps.js"></script>
    <title>JMB | Contact</title>
</head>
<body>
    <?php include 'menu.php'; ?>
<div class="container">
<div class="row">
    <div class="col-sm-5 whiteboard">
        <h1>Contact us</h1>
        <p>Your name<span class="glyphicon glyphicon-asterisk star-size"></span></p>
        <input class="form-control" type="text" placeholder="Name">
        <br>
        <p>Your e-mail<span class="glyphicon glyphicon-asterisk star-size"></span></p>
        <input class="form-control" type="text" placeholder="E-mail">
        <br>
        <form>
            <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control resize-none" rows="5" id="comment"></textarea>
            <br>
            <button class="btn btn-default float-right" type="submit" name="comment-submit">Send</button>
            </div>
        </form>
    </div>

    <div class="col-sm-7 whiteboard pos-right"><h1>Location <small>Address: Maglevænget 2, 2750 Ballerup</small></h1>
    <div id="map"></div> 
<script>
function initMap(){
    var location = {lat: 55.720700, lng: 12.358890};
    var map = new google.maps.Map(document.getElementById("map"),{
        zoom: 6,
        center: location
    });
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_U9TnzZC5Gudt8R6ZN2zEdN4mGIm-Ze4&callback=initMap"></script>
    </div>

  </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>