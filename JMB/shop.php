<?php
require 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
    <title>JMB | Shop</title>
    <script type="text/javascript">
        document.getElementById("toCheckOut").onclick = function () {
        location.href = "checkout.php";
        }
    </script>  
</head>
    <script>

        /////////////////// item information function //////////////////////////
        function itemClick(i) {
            var itemrow = itemList[i];
            var x = document.getElementById("emptyDiv");
            x.innerHTML = "<div class='col-md-8 shop-whiteboard height-size big-viewport position-top'><div class='nameDiv'><h1>"+itemrow.itemName+" </h1></div><div class='flex-shop'><div class='imageDiv'><img src='img/"+itemrow.itemImages+"'</div></div><div class='infoDiv'><form action='includes/shop.inc.php' method='post'><button id='toCheckOut' class='add-to-cart medium-size no-underline' type='submit' name='item-to-carts'>Add to cart <span class='glyphicon glyphicon-shopping-cart cart-size'></span><input id='addBasketItemId' type='hidden' name='itemId'><input type='hidden' name='orderId'></button></form><div class='checkbox2'><p class='no-border position-top2'>Price "+itemrow.price+" DKK</p><p><span class='glyphicon glyphicon-ok'></span> 30 days return policy</p><p><span class='glyphicon glyphicon-ok'></span> 2-5 days delivery</p><h6>"+itemrow.details+"</h6></div></div></div></div>";
            document.getElementById("addBasketItemId").value = itemrow.itemId;
            
        }
    </script>
    
</head>
<body>
    <?php include 'menu.php'; ?>

<!-- MAKES AN ORDER -->
<script>
document.getElementById("addBasketItemId").value = itemrow.itemId;
</script>
<!-- <form action="includes/shop.inc.php" method="post">
<input type="hidden" name="itemId">
<input type="hidden" name="orderId">
<button type="submit" name="inset-order">start an order</button>
</form> -->


<?php




    $sql = "SELECT * FROM items WHERE display=0";
    $result = $conn->query($sql);
    $items = array();
    while(($row = mysqli_fetch_assoc($result))) {
        $items[] = $row;
}
    echo '<script>var itemList = ';
    echo json_encode($items);
    echo ';</script>';
    ?>


<div id="itemlistdiv"></div>


<?php

//add to cart form//not added to real button yet//
// if(isset($_SESSION['userId'])){
//     echo "<form action='includes/shop.inc.php' method='post'>
//     <input id='addBasketItemId' type='hidden' name='itemId'>
//     <input type='hidden' name='orderId'>
//     <button type='submit' name='item-to-cart'>add item</button>
// </form>";
// }else{
//     echo "error ADD SOMETHING";
// }
?>
<?php
// $itemIdDiv = $_POST['delete-item-id'];



// $displayInt = 0;
// if($displayInt == 0){

// echo '<input type="hidden" value="'.$displayInt.'"';


// echo "<script type='text/javascript'>getItems();</script>";
// }else{
//     echo '<h1>snydt, det virker ikke</h1>';
// }


?>
<script>
///////////////////item list////////////////////
// tænkte at siden getItems() spytter alle items, med et itemId fra databasen ud, at den eneste logiske måde var at lave et nyt table som holdt på de midlertidige removed items // men det kunne også hurtigt blive en større opgave //

getItems();
function getItems(){ 
    var y = document.getElementById("itemlistdiv")
    for(i = 0; i<itemList.length;i++){
        var row = itemList[i];         
        y.innerHTML += `<div class='container-fluid'>
            <div class='row img-sizing'>
                <div class='col-md-2 col-md-offset-1 shop-whiteboard'>
                    <a onclick='itemClick(`+i+`)' href='#!' class='big-viewport afterlink'>
                        <img src='img/`+row.itemImages+`' alt='bluetooth speakers'>
                        <h4>`+row.itemName+` `+row.price+`,-</h4>
                        <h5>`+row.details+`</h5>
                    </a>
                    <a href='itemdetails.php' class='afterlink small-viewport'>
                        <img src='img/`+row.itemImages+`' alt='bluetooth speakers'>
                        <h4>`+row.itemName+` `+row.price+`,-</h4>
                        <h5>`+row.details+`</h5>
                    </a>
                </div>
            </div>
        </div>`;
                   
    }
    

}
</script>




<div id="emptyDiv"></div>
  


<!-- ///////////////////standard code for items within a bs div///////////////////// -->

<!-- <div class="container-fluid">
<div class="row img-sizing">
    <div class="col-md-2 col-md-offset-1 shop-whiteboard border">
        <img src="img/fakegpspic.png" alt="gps image">
    <p></p>
    </div>
    <div class="col-md-2 shop-whiteboard border">
    <img src="img/fakebluetoothspeak.jpg" alt="bluetooth speakers">
    <p></p>
    </div>
    <div class="col-md-2 shop-whiteboard border">
    <img src="img/fakecardgps.jpg" alt="card gps">
    <p></p>
    </div>
    <div class="col-md-2 shop-whiteboard border">
    <img src="img/fakeinears.jpg" alt="in ears wireless bluetooth">
    <p></p>
    </div>
    <div class="col-md-2 shop-whiteboard border">
    <img src="img/fakepb.jpg" alt="power bank">
    <p></p>
    </div>
</div>
</div> -->
<?php include 'footer.php'; ?>
</body>
</html>