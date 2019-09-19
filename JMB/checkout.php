<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php'; ?>


  <title>JMB | Checkout</title>
  <!-- <script>
    function popupFun(){
        var x = document.getElementById("popupdiv");
        x.innerHTML = "<div class='container-fluid'><div class='row'><div class='col-md-4 col-md-offset-4'><div col-md-12 class='this-is-pop'><input id='checkboxq' type='checkboxq' class='checkboxq'/><label id='open' for='checkboxq' class='btn btn-default btn-sm'> <span onclick='closePop()' class='show-text nowayjose'><a class='nowayjose' href='#!'></a></span></label><div id='show'><label for='checkboxq' class='second-label btn btn-default btn-sm'></label></div><a class='yeswayjose' href='shop.php'>Continue shopping</a></div></div></div></div>";
    }
    function closePop() {
  var x = document.getElementById("popupdiv");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
    </script> -->
    <!-- <script>
$(window).load(function()
{
    $('#myModal').modal('show');
});
</script> -->
</head>
<body>
<?php include 'menu.php'; ?>

<div class="container"> 
  <!-- Modal... Continue shopping or go to cart-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal text-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Need anything else?</h4>
        </div>
        <div class="modal-body">
          <a href='shop.php'>Continue shopping</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<div id="popupdiv"></div>
<!-- <div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1 whiteboard-checkout">
      
        <div class="checkout-div-1">
        </div>
        <div class="flex-shop">
        <div class="checkout-div-2">

        </div>    
        <div class="checkout-div-2-info">
        <form action="includes/checkout.inc.php" method="post">
        <button class="btn btn-default" type="submit" name="checkout-submit">Go to payment</button>
        </form>
        </div>
        </div>

        
      
    </div>
  </div>
</div> -->

<?php

require 'includes/dbh.inc.php';

if(isset($_SESSION['orderId'])){
  $userAndOrderId=$_SESSION['orderId'];

  $sql = "SELECT * FROM orders WHERE orderId=$userAndOrderId";
      $result = mysqli_query($conn, $sql);
      while ($row = $result->fetch_assoc()){
          $orderId = $row['orderId'];
      }
  $stringName = array();
  $stringPrice = array();
  $sql2 = "SELECT * FROM orderDetails WHERE orderId=$userAndOrderId";
  $result2 = mysqli_query($conn, $sql2);
  while ($row2 = $result2->fetch_assoc()){
      $itemId = $row2['itemId'];
        $sql3 = "SELECT * FROM items WHERE itemId=$itemId";
        $result3 = mysqli_query($conn, $sql3);
        while ($row3 = $result3->fetch_assoc()){
          $itemName = $row3['itemName'];
          $stringName[] = "<button class='no-border bg-fff-white' type='submit' name='delete-submit'><a href='#!' class='no-hover big-viewport underline-hover black-color'>
          <span class='glyphicon glyphicon-remove-circle red'></span>
      </a></button>".$row3['itemName']." ";
          $stringPrice[] = $row3['price'];
          $single_array[] = $row3['itemName'];
  ?>
<form action="includes/removeitem.inc.php" method="POST">
  <button class='no-border' type='submit' name='user-itemremove'>
    <a href='#!' class='no-hover big-viewport underline-hover black-color'>
      <span class='glyphicon glyphicon-remove-circle red'>

      </span>
    </a>
  </button>
</form>
  <?php
  
  //         echo "<div class='container-fluid'>
  //         <div class='row'>
  //           <div class='col-md-10 col-md-offset-1 whiteboard-checkout'>
              
  //               <div class='checkout-div-1'>
  //               </div>
  //               <div class='flex-shop'>
  //               <div class='checkout-div-2'>
  //               </div>    
  //               <div class='checkout-div-2-info'>
  //               <form action='includes/checkout.inc.php' method='post'>
  //               <button class='btn btn-default' type='submit' name='checkout-submit'>Go to payment</button>
  //               </form>";
  //         echo "<h1>";                
  //         echo $row3['itemName']." ";
  //         echo $row3['price'];
  //         echo "</h1>";
  //         echo "</div>
  //       </div>
  //     </div>
  //   </div>
  // </div>";
  }
  }
  
  
  
  echo "<div class='container-fluid'>
          <div class='row'>
            <div class='col-md-8 col-md-offset-2 whiteboard-checkout'> 
                <div class='checkout-div-1'>
                  <h1>Your cart</h1>
                </div>";
  echo "<div class='flex-shop'>
          <div class='checkout-div-2-info'>
            <h1>".implode('<br>', $stringName)."</h1>
          </div>";
  // $stringPrice skal lægges sammen og så vise både single og total output //
  
  echo "<div class='checkout-div-3-info'>
          <h1>".implode('<br>', $stringPrice), '<br>'."</h1>";
  print_r(array_sum($stringPrice));
  echo "</div></div>";
  
  
  echo "</div>
      </div>
    </div>";
}

?>
<form action='includes/checkout.inc.php' method='post'>
              <button class='btn btn-default' type='submit' name='checkout-submit'>Go to payment</button>
              </form>
<?php include 'footer.php'; ?>
</body>
</html>