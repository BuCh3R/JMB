<?php
session_start();
require 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php'; ?>
    <title>JMB | ADMIN PAGE</title>
    <script>
        /////////////////// function information and add to cart ////////////////
        function itemClick(itemId) {      
            let x = document.getElementById("emptyDiv");
            x.innerHTML = "<div class='col-md-5 col-md-offset-7 shop-whiteboard height-size big-viewport position-top'><h1>"+itemId+"</h1><form action='includes/adminedit.inc.php' method='post'><input type='hidden' name='idItem' value='"+itemId+"'><input type='text' name='changeName'><br><input type='text' name='changePrice'><br><textarea type='text' name='changeDetails'></textarea><br><button type='submit' name='change-item-submit'>Change Name</button></form></div>";
        }
    </script>
</head>


            <div id="emptyDiv" class="position-top-crud">

            </div>

<?php
    if(isset($_SESSION["userUid"])){
        if($_SESSION["userUid"] == 'test' or 'test2') { 
            echo '<h1 class="white-color">CRUD // Create Read Update Delete //</h1>';
            
            echo '<form action="includes/adminpage.inc.php" method="post">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-md-offset-1 black-background">
                        <h4>Create New Item</h4>
                        <input class="form-control" type="text" name="itemname" placeholder="Item Name..."> 
                        <br>
                        <input class="form-control" type="text" name="itemprice" placeholder="Item Price...">
                        <br>
                        <textarea class="form-control resize-none" rows="5" name="itemdetails" placeholder="Item Details..."></textarea>
                        <br>
                        <button class="btn btn-default" type="submit" name="submit-item">Done</button>  
                        </form>
                    </div>
                    <div class="col-md-2 black-background">
                        <h4><a href="orders.php">Go To Orders</a></h4>
                        <a href="orders.php"><span class="glyphicon glyphicon-list"></span></a>
                    </div>
                </div>
            </div><button type="submit"><a class="btn btn-default" href="index.php">Til startsiden</a></button>';
            
        }else{
            header("Location: crudadmin.php?error=not_admin");
            exit();
        }
    }
    
    
?>
<body>
    
                

<?php
// itemNameLol($conn);
// function itemNameLol($conn){
//     $sql2 = "SELECT * FROM items WHERE itemId=1";
//     $result2 = $conn->query($sql2);
//     while($row2 = $result2->fetch_assoc()){
//         $itemName = $row2['itemName'];
//         echo "<h1>$itemName</h1>";
//     }
// }


?>

<?php
getItems($conn);

function getItems($conn){ 
    $sql = "SELECT * FROM items";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        $itemId = $row['itemId'];      
        $itemOne = $row['itemName'];
        $itemOnePrice = $row['price'];
        $itemDetails = $row['details'];     
        echo "
        <div class='container-fluid'>
            <div class='row img-sizing'>
                <div class='col-md-3 col-md-offset-1 shop-whiteboard-edit span-right button-no-bord'>
                    <h4>$itemOne &nbsp; $itemOnePrice,- 
                        <form action='includes/delete.inc.php' method='post'><input type='hidden' name='delete-item-id' value='$itemId'><button class='float-right' type='submit' name='delete-submit'><a href='#!' class='no-hover big-viewport underline-hover black-color'>
                            <span class='glyphicon glyphicon-remove-circle red'></span>
                        </a></button><button class='float-right gray' type='submit' name='restore-submit'><span class='glyphicon glyphicon-refresh'</span></button></form>
                        
                        <a  onclick='itemClick(".$itemId.")' href='#!' class='no-hover big-viewport underline-hover black-color'>
                            <span class='glyphicon glyphicon-wrench gray'></span>
                        </a>
                    </h4>
                    <h5>$itemDetails</h5>

                    <a onclick='itemClick()' href='itemdetails.php' class='no-hover small-viewport underline-hover black-color'>
                        <h4>$itemOne $itemOnePrice,-</h4>
                        <h5>$itemDetails</h5>
                    </a>
                </div>
            </div>
        </div>";           
    }
    

}

?>


<!-- <div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-md-offset-2 text-col-white">
                <p>NAME <span class="glyphicon glyphicon-wrench"></span> <span class="glyphicon glyphicon-remove-circle"></span></p>
        </div>
        <div class="col-md-2 text-col-white">
                <p>NAME <span class="glyphicon glyphicon-wrench"></span> <span class="glyphicon glyphicon-remove-circle"></span></p>
        </div>
        <div class="col-md-2 text-col-white">
                <p>NAME <span class="glyphicon glyphicon-wrench"></span> <span class="glyphicon glyphicon-remove-circle"></span></p>
        </div>
        <div class="col-md-2 text-col-white">
                <p>NAME <span class="glyphicon glyphicon-wrench"></span> <span class="glyphicon glyphicon-remove-circle"></span></p>
        </div>
        <div class="col-md-2 text-col-white">
                <p>NAME <span class="glyphicon glyphicon-wrench"></span> <span class="glyphicon glyphicon-remove-circle"></span></p>
        </div>
    </div>
</div> -->

</body>
</html>