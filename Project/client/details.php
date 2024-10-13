<?php
session_start();
include "menu.php";
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php
        include "head.php";
   ?>
  
</head>
<body>
    <center>  
   <?php
   $maxvalue;
$pid=$_POST['pid'];
$price;
$result=mysqli_query($con,"select * from product where pid='$pid'");
$max=mysqli_query($con,"select * from stock where pid='$pid'");
while($quantity=mysqli_fetch_array($max))
{
  $maxValue=$quantity[1];
}
echo "<h2 align='center'>Detail of selected item:</h2><br><br>";
echo "<div class='container'>";
echo "<div class='row row-cols-1 row-cols-lg-3' >";
while($data=mysqli_fetch_array($result))
{
    
  echo "<div class='col'><br> ";
  
  echo "<img src='images/productImages/". $data[5] . "' name='$data[0]' width='300px' height='320px' alt='...'></div>";
  echo "<div class='col' style='margin-top:4%'><h2>".$data[2]."</h2>";
  $dis=$data[4]*3/100;
  $or=$dis*$data[4]/100;
  $strk=$data[4]+$or;
  echo "<h3 style='color:green'>$dis % off</h3>";
  echo "<h3>Only on Rs.<strike style='color:red'>".$strk."</strike><br>".$data[4]."(kg)</h3>";
  echo "<h3>Description:".$data[3]."</h3>";
//   echo "<h1>Quantity</h1>";
//   echo "<h2><button id='decreaseBtn' name='decrease'>-</button>
//    <span id='display'>". $value ."</span>
//   <button id='increaseBtn' name='increase'>+</button></h2>";
echo "<form action='#' method='POST'>";
echo  "<h3>Quantity:  </h3>";
   echo "<input type=button id='btnDecre' class='input-group-text decrement-button' value= '-'>";
    echo "<input id='qty' name='qty' type='text' class='form-control input-qty text-center bg-white' value='1'>";
    echo "<input type=button  id='btnIncre'  class='input-group-text increment-button' value= '+'>  ";
  echo "<h3 id='message'  style='color:red'></h3></div>";
  echo"<input type='hidden' name='pid' value='$data[0]'>";
  echo"<input type='hidden' name='price' value='$data[4]'>";
  echo "<div class='col' style='margin-top:10%'>
  <button name='cart' class='btn btn-success'>Add to cart</button><br><br>";
  echo "<button name='buy' class='btn btn-success'>Buy now</button>";
echo "</form></div>";
}
?>

<?php
echo "</div></div><br>";
 

echo "<br><br><hr>";
echo "<h1>Other products:</h1><br><br>";
if(isset($_POST["cart"]))
{
    if(!isset($_SESSION["email"]))
    {
      
      echo "<script>alert('You must have to login first!!!');</script>";
      echo "<script>window.location.assign('login.php');</script>";
    }
   else
   {
    $pid=$_POST['pid'];
   $price=$_POST['price'];
  // $qty=$_POST['qty'];
   $cusid=$_SESSION['cusid'];
   $quantity=$_POST['qty'];
   $total=$price*$quantity;
   $address=$_SESSION['address'];
   $date=date('Y-m-d H:m:s');
   
   //$quantity=$maxValue-$value;
   mysqli_query($con,"insert into cart (cusid,pid,qty,price,totalprice,date,status) values ($cusid,$pid,$quantity,$price,$total,'$date','cart')");
   unset($_SESSION['qty']) ;
   //mysqli_query($con,"update stoke set qty=$quantity where pid=$pid");
    echo "<script>alert('successfully added to cart');</script>";
    echo "<script>window.location.assign('cart.php');</script>"; 
   
}
}
if(isset($_POST["buy"]))
{
    if(!isset($_SESSION["email"]))
    {
      
      echo "<script>alert('You must have to login first!!!');</script>";
      echo "<script>window.location.assign('login.php');</script>";
    }
   else
   {
  //   $pid=$_POST['pid'];
  //  // $price=$_POST['price'];
  //  $qty=$_POST['qty'];
  //  $cusid=$_SESSION['cusid'];
  //  $total=$price*$qty;
  //  $date=date('Y-m-d H:m:s');
  //  mysqli_query($con,"insert into checkout (cusid,pid,qty,price,totalprice,date,status) values ($cusid,$pid,$value,$price,$total,'$date','ordered')");
  //   echo "<script>alert('Item is ready to delever soon....');</script>";
  //   echo "<script>window.location.assign('order.php');</script>";
  $cusid=$_SESSION['cusid'];
  $price=$_POST['price'];
  $address=$_SESSION['address'];
  $pid=$_POST['pid'];
  $quantity=$_POST['qty'];
 $total=$price*$quantity;
 $date=date('Y-m-d H:m:s');
 $crtno=$_POST['crtno'];
 if(mysqli_query($con,"insert into checkout(cusid,pid,qty,price,totalprice,address,status) values($cusid,$pid,$quantity,$price,$total,'$address','ordered')"))
 {
 mysqli_query($con,"update cart set status='ordered' where crtno='$crtno'");
 }
  
   
   echo "<script>window.location.assign('payment_method.php');</script>";
   
}
}
	// showing more items 
  
  $result=mysqli_query($con,"select * from product");
  echo "<div class='container'>";
  echo "<div class='row row-cols-1 row-cols-lg-3 row-cols-md-2' width='100%'>";
  while($data= mysqli_fetch_array($result))
  {   
    echo "<div class='col'><br> ";
    echo "<form action='details.php' method='POST'>";
    echo "<img src='images/productImages/". $data[5] . "' name='$data[0]' width='220px' height='250px' alt='...'>";
    echo "<h2>".$data[2]."</h2>";
    $dis=$data[4]*3/100;
  $or=$dis*$data[4]/100;
  $strk=$data[4]+$or;
  echo "<h3 style='color:green'>$dis % off</h3>";
  echo "<h3>Only on Rs.<strike style='color:red'>".$strk."</strike><br>".$data[4]."(kg)</h3>";
    echo "<input type='submit' value='Show Detail' class='btn btn-info'>";
    echo"<input type='hidden' name='pid' value='$data[0]'>";
  echo "</form></div>";
  }
  echo "</div></div><br>";
	
include 'footer.php';
?>
<script>
// document.addEventListener("DOMContentLoaded", function() {
//     document.getElementById("btnIncre").addEventListener("click", function() {
//         sendRequest("increase");
//     });
    
//     document.getElementById("btnDecre").addEventListener("click", function() {
//         sendRequest("decrease");
//     });
    
//     function sendRequest(action) {
//         var xhr = new XMLHttpRequest();
//         xhr.open("POST", window.location.href, true);
//         xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         xhr.onreadystatechange = function() {
//             if (xhr.readyState == 4 && xhr.status == 200) {
//                 var currentValue = parseInt(document.getElementById("qty").innerText);
//                 if (action === "increase") {
//                     if (currentValue < <?php echo $maxValue; ?>) {
//                         document.getElementById("qty").innerText = currentValue + 1;
//                     } else {
//                         document.getElementById("message").innerText = "Out of stock!";
//                     }
//                 } else if (action === "decrease") {
//                     document.getElementById("qty").innerText = Math.max(0, currentValue - 1);
//                     document.getElementById("message").innerText = "";
//                 }
//             }
//         };
//         xhr.send(action + "=true");
//     }
// });
</script>

</body>
</html>
