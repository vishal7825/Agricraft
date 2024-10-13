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
    <title>Order</title>
</head>
<body>
    <br><br>
    <center>
    <h2>Your order list:</h2>
    <br><br><br><br>
    <hr>
   <?php
   $cusid=$_SESSION["cusid"];
   $result=mysqli_query($con,"select * from checkout where status!='canceled' and cusid='$cusid' ORDER BY status DESC");
   while($fetch=mysqli_fetch_array($result))
   {
   $pid=$fetch['pid'];
   $crt=$fetch['oid'];
   $status=$fetch['status'];
$product=mysqli_query($con,"select * from product  where pid='$pid'");
while($data=mysqli_fetch_array($product)) 
{

    echo "<div class='container'>";
    echo "<div class='row row-cols-1 row-cols-md-2 row-cols-lg-3'>";
    echo "<div class='col' style='margin-top:4%'>";
    echo "<img src='images/productImages/". $data[5] . "' name='$data[2]' width='300px' height='320px' alt='...'></div>";
    echo "<div class='col' style='margin-top:3%;'><h2>".$data[2]."</h2>";
    $value=$fetch['qty'];
    echo "<h3>Total Price:".$fetch[5]."</h3>";
    echo "<h3>Quantity:".$fetch[3]."(K.G.)</h3>";
    echo "<h3>Address:".$fetch[7]."</h3>";
    if($status=='confirmed')
   {
    echo "<h3 > Your order has been confirm it will be deliver soon....!!!</h3>";
   }
   if($status=='ordered')
   {
    echo "<h3 > Your order is under review please wait for dispatched!!!</h3>";
   }
   if($status=='delivered')
   {
    echo "<h3 > Your order has been deleverd!!!</h3>";
   }
   
    echo "<form actio='#' method='post'>";
    if($status!='delivered')
    {
    echo "<input type='submit' name='cancel' value='cancel order'>";
    }
    echo "<input type='hidden' name='p_id' value='$pid'>";
    echo "<input type='hidden' name='crtno' value='$crt'>";
    echo "</form>";
    echo "</div></div></div><br><hr><br><br>";
    }

}
if(isset($_POST['cancel']))
{
    $crtno=$_POST['crtno'];
 mysqli_query($con,"update checkout set status='canceled' where oid='$crtno'  ");
 echo "<script>alert('Successfully canceled!!!!!');</script>";
 echo "<script>window.location.assign('order.php');</script>";
}

?>
<br><br><br><br>
</body>
</html>
<?php
include "footer.php";
?>
<script>

</script>