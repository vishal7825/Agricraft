<?php
session_start(); 
include "conn.php";
include "menu.php";
include "head.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>payment</title>

</head>
<body>
<header>
	<br><br>
	<div class="container">
	<div class="left">
			<h3>BILLING ADDRESS</h3>
			<form action="#" method="POST">
				Full name
				<input type="text" name="name" placeholder="Enter name" required/><br>
				Email
				<input type="text" name="email" placeholder="Enter email" required/><br>

				Address
				<input type="text" name="address" placeholder="Enter address"  minlength=20 maxlength=40 required/><br>
				
				City
				<input type="text" name="city" placeholder="Enter City" required/><br>
				<div id="zip">
					
						<label>
						Pin code
						<input type="number" name="pincode" placeholder="Pin code"  minlength=6 maxlength=6 required/>
					</label>
				</div>
</div>
		<div class="right">
			<h3>PAYMENT</h3>
			
				Accepted Card <br>
				<img src="images/card1.png" width="100">
				<img src="images/card2.png" width="50">
				<br><br>
				<p>
            Card Type: <select name="card_type" id="card_type"required>
                <option value="">--Select a Card Type--</option>
                <option value="Visa">Visa</option>
                <option value="Upi">UPI</option>
                <option value="paypal">PayPal</option>
				<option value="Rupay">Rupay</option>
                <option value="MasterCard">MasterCard</option>
            </select>
        
        </p>
	
				Credit card number
			<input type="text" name="crdno" placeholder="Enter card number" onkeypress="return onlyNum(event)"  minlength=16 maxlength=16 required/><br>
				
				Exp month
				<input type="text" name="expmonth" placeholder="Enter Month" onkeypress="return onlyNum(event)" minlength=2 maxlength=2 required /><br>
				<div id="zip">
					<label>
						Exp year
						<select>
							<option>Choose Year..</option>
							<selected><option>2023</option></selected>
							<option>2024</option>
							<option>2025</option>
							<option>2026</option>
                            <option>2027</option>
							<option>2028</option>
							<option>2029</option>
							<option>2030</option>
						</select>
					</label>
						<label>
						CVV
						<input type="text" name="cvv" placeholder="CVV" onkeypress="return onlyNum(event)"  minlength=4 maxlength=4  required/>
					</label>
				</div>
			<center>
			<input type="submit" name="pay" value="Proceed to Checkout" >
</form>
<br><br>
		</div>
</div>
	<?php   
if(isset($_POST["pay"]))
{
	$name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
	
	if(mysqli_query($con,"insert into shipping (name,email,address,city,pincode) values ('$name','$email','$address','$city',$pincode)")){
			echo "<script>alert('Payment Successfull!! Your Order Is Under Review...!!!!');</script>";
			echo "<script>window.location.assign('order.php');</script>";
		}
			else{
			echo "<script>alert('Payment Cancelled By User!!!!');</script>";
			}
}
?>
	<script>
	function onlyNum(event)
	{
		var a=event.which?event.which:event.keyCode;
		if(a<48 || a>57)
			return false;
		return true;
	}
</script>
</header>
<?php
include "footer.php";
?>
</body>
</html>