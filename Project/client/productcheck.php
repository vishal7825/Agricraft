<?php
session_start();
include "conn.php";
$product=$_REQUEST["sproduct"];

if($product!='all')
{
$result=mysqli_query($con,"select * from product where cid='$product'");
}
elseif($product='')
{
$result=mysqli_query($con,"select * from product");
}

else
{
    $result=mysqli_query($con,"select * from product");
}
echo "<div class='container'>";
echo "<div class='row row-cols-1 row-cols-lg-3'>";
while($data= mysqli_fetch_array($result))
{   
  echo "<div class='col'><br> ";
  echo "<form action='details.php' method='POST'>";
  echo "<img src='images/productImages/". $data[5] . "' name='$data[0]' width='220px' height='250px' alt='...'>";
  echo "<h2>".$data[2]."</h2>";
  echo "<h3>Only on Rs.".$data[4]."(kg)</h3>";
  echo "<input type='submit' value='Show Detail' class='btn btn-info'>";
  echo"<input type='hidden' name='pid' value='$data[0]'>";
echo "</form></div>";
}
echo "</div></div><br>";
 
	
 ?>

<script>

function hi()
{
    
    window.location.assign('details.php');
  
}
</script>
