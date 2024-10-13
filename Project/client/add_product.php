<?php
session_start();
	include "conn.php";
    require 'menu.php'; 
    include "head.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	
	</head>
	<body>

		<!-- One -->

			<section id="one" class="wrapper style1 align-center">
				<div class="container">
					<form method="POST" action="#" enctype="multipart/form-data">
						<h2>Enter the Product Information here..!!</h2>
						<br>
				<center>
					<input type="file" name="productPic"></input>
					<br />
				</center>
				<div class="row">
					  <div class="col-sm-6">
						  <div class="select-wrapper" style="width: auto" >
							  <select name="type" id="type" required style="background-color:white;color: black;">
							  <?php
								$result=mysqli_query($con,"select * from category");
								echo "<option value='' >- Category -</option>";
								while($data= mysqli_fetch_array($result))
								{
								 echo " <option value='$data[1]'>$data[1]</option>";
								}
								  ?>
							  </select>
						</div>
					  </div>
					  <div class="col-sm-6">
						<input type="text" name="pname" id="pname" value="" placeholder="Product Name" style="background-color:white;color: black;" required/>
					  </div>
				</div>
				<br>
				<div>
					<textarea  name="pinfo" id="pinfo" rows="8" style="background-color:white;color: black"; required></textarea>
				</div>
			<br>
			<div class="row">
				<div class="col-sm-6">
					  <input type="text" name="price" id="price" value="" placeholder="Price" style="background-color:white;color: black;" required/>
				</div>
                <div class="col-sm-6">
					  <input type="text" name="qty" id="qty" value="" placeholder="Quantity(kg)" style="background-color:white;color: black;" required/>
				</div>
</div>
          <br>
<input class="submit" type="submit" name="submit" value="Upload" class='btn btn-primary'>	
<input type="reset" value="Reset" name="reset"/>
			</form>
		</div>
	</section>

<?php   
if(isset($_POST["submit"]))
{
	if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$productType = $_POST['type'];
		$productName = dataFilter($_POST['pname']);
		$productInfo = $_POST['pinfo'];
		$productPrice = dataFilter($_POST['price']);
	
		$pic = $_FILES['productPic'];
		$picName = $pic['name'];
		$picTmpName = $pic['tmp_name'];
		$picSize = $pic['size'];
		$picError = $pic['error'];
		$picType = $pic['type'];
		$picExt = explode('.', $picName);
		$picActualExt = strtolower(end($picExt));
		$allowed = array('jpg','jpeg','png');

		if(in_array($picActualExt, $allowed))
		{
			if($picError === 0)
			{
				$picNameNew = $picName;
				$_SESSION['productPicName'] = $picNameNew;
				$_SESSION['productPicExt'] = $picActualExt;
				$picDestination = "images/productImages/".$picNameNew;
				move_uploaded_file($picTmpName, $picDestination);
				
			}
		}
	
$pname=$_POST['pname'];
$cat=$_POST['type'];
$descr=$_POST['pinfo'];
$price=$_POST['price'];
$qty=$_POST['qty'];
	if(mysqli_query($con,"insert into product (category,pname,descr,price,qty,photo) values ('$cat','$pname','$descr',$price,$qty,'$picNameNew')")){
			echo "<script>alert('Product uploaded successfull!!!!');</script>";
			echo "<script>window.location.assign('index.php');</script>";
		}
			else{
			echo "<script>alert('Could not Upload!!!!');</script>";
			}
} 
}
function dataFilter($data)
	{
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}
?>
	</body>
</html>
<?php
include "footer.php";
?>