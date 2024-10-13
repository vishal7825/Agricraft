<?php
session_start();
include "conn.php";
include "menu.php";
include "head.php";
?>
<?php
  if(isset($_POST['submit'])){
    mysqli_query($con,"update customer_order set paymentMethod='".$_POST['method']."'where customer_id='".$_SESSION['id']."' and paymentMethod is null");

    if($_POST['method']=='debit')
    {
      header('location:payment.php');
    }
    if($_POST['method']=='cash')
    {
      echo "<script>alert('Your order is under review!!!!!');</script>";
      echo "<script>window.location.assign('order.php');</script>";
    }
    unset($_SESSION['cart']);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay method</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/bootstrap.css.map" rel="stylesheet">
    
</head>
<body>
<form action="#" method="post">
<div class="container101">
	<center>
	<h1>Select Payment Method</h1>
    <br><br><br>
  <ul>
  <li>
    <input type="radio" id="f-option"  name="method" value="cash">
    <label for="f-option"><h2>Cash-On-delivery</h2></label><br><br>
    <div class="check"></div>
  </li>
  
  <li>
    <input type="radio" id="s-option" name="method" value="debit">
    <label for="s-option"><h2>Debit-Credit Card</h2></label>
    
    <div class="check"><div class="inside101"></div></div>
  </li>
  
  <li>
    <input class="btn btn-success" style="margin-top:30px;margin-left:70px" type="submit" id="t-option" value="continue" name="submit"/>
  </li>
</ul>
</center>
</div>
</form>
<?php
include "footer.php";
?>
</body>
</html>