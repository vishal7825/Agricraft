<?php
session_start();
include "menu.php";
include "conn.php";
include "head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <br><br>
    <center>
    <h2>Your cart list:</h2>
    <br><br><br><br>
    <hr>
    <?php
    
$value;
$maxValue;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["increase"]) && $value < $maxValue) {
       
        $value++;
    } elseif (isset($_POST["decrease"])) {
       
        $value = max(0, $value - 1);
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
   if(isset($_POST["increase"]))
   {
     $value++;
     $_SESSION['qty']+=$value;
   }
}
$cusid=$_SESSION["cusid"];
$result=mysqli_query($con,"select * from cart where cusid='$cusid'");
while($fetch=mysqli_fetch_array($result))
{
$pid=$fetch['pid'];
$max=mysqli_query($con,"select * from stock where pid='$pid'");
while($quantity=mysqli_fetch_array($max))
{
  $maxValue=$quantity[1];
}
$product=mysqli_query($con,"select * from product where pid='$pid'");
while($data=mysqli_fetch_array($product)) 
{
    if($fetch['status']== 'cart')
    {
    echo "<div class='container'>";
    echo "<div class='row row-cols-1 row-cols-md-2 row-cols-lg-3'>";
    echo "<div class='col' style='margin-top:4%'>";
    echo "<img src='images/productImages/". $data[5] . "' name='$data[2]' width='300px' height='320px' alt='...'></div>";
    echo "<div class='col' style='margin-top:3%;'><h2>".$data[2]."</h2>";
    echo "<h3>Description:".$data[3]."</h3>";
    $value=$fetch['qty'];
    echo "<h3>Price(1 K.G.):".$fetch[4]."</h3>";
    echo "<h3>Total Price:".$fetch[5]."</h3>";
    echo "<form action='#' method='POST'>";
    echo  "<h3>Quantity:  </h3>";
       echo "<input type=button id='btnDecre' class='input-group-text decrement-button' value= '-'>";
        echo "<input id='qty' name='qty' type='text' class='form-control input-qty text-center bg-white' value='1'>";
        echo "<input type=button  id='btnIncre'  class='input-group-text increment-button' value= '+'>  ";
      echo "<h3 id='message'  style='color:red'></h3></div>";
    echo "<div class='col' style='margin-top:10%'>";
    echo '<input type="submit" name="checkout" value="Checkout" class="btn btn-primary"><br><br><br>';
echo "<input type='submit' value='Remove' name='remove' class='btn btn-danger'>";
echo"<input type='hidden' name='pid' value='$fetch[2]'>";
    echo"<input type='hidden' name='crtno' value='$fetch[0]'>";
    echo"<input type='hidden' name='price' value='$fetch[4]'>";
   
    echo "<label for='$fetch[0]'></label>";
    echo "</form></div>";
    echo "</div></div><br><hr><br><br>";
    }
}
}
if(isset($_POST["remove"])) 
{
   $pid=$_POST['pid'];
   $crtno=$_POST['crtno'];
mysqli_query($con,"update cart set status='removed' where crtno='$crtno'");
echo "<script>alert('Successfully removed from cart!!!!!');</script>";
echo "<script>window.location.assign('cart.php');</script>";
}   

if(isset($_POST["checkout"])) 
{
    $price=$_POST['price'];
    $address=$_SESSION['address'];
    $pid=$_POST['pid'];
    $quantity=$_POST['qty'];
   $total=$price*$quantity;
   $date=date('Y-m-d H:m:s');
   $crtno=$_POST['crtno'];
   //mysqli_query($con,"insert into order (cusid,pid,qty,price,totalprice,date,address) values ($cusid,$pid,$qty,$price,$total,'$date','$address')");
   //mysqli_query($con,"insert into order (cusid,pid,qty,price,totalprice,date,address) values ($cusid,1,1,100.00,300.00,'$date','hi')");
   if(mysqli_query($con,"insert into checkout(cusid,pid,qty,price,totalprice,address,status) values($cusid,$pid,$quantity,$price,$total,'$address','ordered')"))
   {
   mysqli_query($con,"update cart set status='ordered' where crtno='$crtno'");
   }
     echo "<script>window.location.assign('payment_method.php');</script>";
     
}

?>
<br><br><br><br>

</body>
</html>
<?php
include "footer.php";
?>
<!-- <script>
        function insertProducts() {
            const form = document.getElementById("productForm");
            const checkboxes = form.querySelectorAll('input[type="checkbox"]:checked');
            const selectedProducts = [];

            checkboxes.forEach(checkbox => {
                selectedProducts.push(checkbox.value);
            });

            if (selectedProducts.length > 0) {
                const formData = new FormData();
                formData.append("products", selectedProducts);

                fetch("insert_products.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(result => {
                    alert(result);
                });

                updateTotalPrice(selectedProducts);
            } else {
                alert("Please select at least one product.");
            }
        }

        function updateTotalPrice(products) {
            let totalPrice = 0;
            products.forEach(product => {
                const [, , price] = product.split(",");
                totalPrice += parseFloat(price);
            });
            document.getElementById("totalPrice").textContent = totalPrice.toFixed(2);
        }
    </script> -->
   
