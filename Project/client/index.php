<?php 
session_start(); 
require 'menu.php';
include "conn.php";
include "head.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		
<title>
Agricraft
</title>
	</head>
		<body>
			<center>
		<?php
if(isset($_SESSION["name"]))
{
     ?>
	 <section id="banner" class="wrapper">
<h2>welcome</h2>
<h2><?php echo $_SESSION["name"] ?></h2>
</section>
<?php
}
else
{
   ?>
			<section id="banner" class="wrapper">
				<div class="container">
				<h2> Agricraft </h2>
				<p>Easy to purchase</p>
				<br><br>
				<?php
   }?>
   
					</div>
				</div>
			</section>
		<br>
	<h1>Product Gallery:</h1><br>
	<?php
	
	$result=mysqli_query($con,"select * from product order by pid desc limit 9");

echo "<div class='container'>";
echo "<div class='row row-cols-1 row-cols-lg-3 row-cols-md-2' width='100%'>";
while($data= mysqli_fetch_array($result))
{   
  echo "<div class='col' style='margin-top:5%'><br> ";
  echo "<form action='product.php' method='POST'>";
  echo "<img src='images/productImages/". $data[5] . "' name='$data[0]' width='220px' height='250px' alt='...'>";
  echo "<h2>".$data[2]."</h2>";
  $dis=$data[4]*3/100;
  $or=$dis*$data[4]/100;
  $strk=$data[4]+$or;
  echo "<h3 style='color:green'>$dis % off</h3>";
  echo "<h3>Only on Rs.<strike style='color:red'>".$strk."</strike><br>".$data[4]."(kg)</h3>";
  echo "<input type='submit' name='submit'value='View more' class='btn btn-primary'>";
echo "</form></div>";
}
echo "</div></div><br>";
if(isset($_POST['submit']))
 {
	echo "<script>window.location.assign('index.php');</script>";
 }
	?>
	</body>
</html>
<?php
include "footer.php";
?>