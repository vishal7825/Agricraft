<?php
session_start();
include "menu.php";
include "conn.php";
?>
<html>
<head>
    <?php
    include "head.php";
    ?>
</head>
<head><meta charset="utf-8">
<script src="Regis/regis1.js"></script>
<script src="Regis/regis2.js"></script>
<script src="Regis/regis3.js"></script>

<!-- jQuery plugin .js files -->
<script>

$().ready(function () {

$("#ValidateForm").validate({

rules: {
    mobile: {

required: true,

minlength: 10

},
pincode: {

required: true,

minlength: 6

},
name: {

required: true,

minlength: 3

},

password: {

required: true,

minlength: 8

},

confirm_password: {

required: true,

minlength: 8,

equalTo: "#password"

},
address:"required",

email: {

required: true,

email: true

},

agree: "required"

},

// in 'messages' user have to specify message as per rules

messages: {

mobile: 
{
    required: " Please enter a username",
    minlength:" Please enter mobile number of length 10",
},
pincode: 
{
    required: " Please enter a pincode",
    minlength:" Please enter mobile number of length 6",
},
name: {

required: " Please enter a username",

minlength: " Your username consist of at least 3 characters"

},
address:  " Please enter a Your Address",


password: {

required: " Please enter a password",

minlength: "Password is too short!! Your password must be consist of at least 8 characters"

},

confirm_password: {

required: " Please enter a password",

minlength: " Your password must be consist of at least 8 characters",

equalTo: " Please enter the same password as above"

},

agree: "Please accept our policy"

}

});

});

</script>

</head>

<body>
<center>
	<br><h2>Registration:</h2>
	<br>
<form class="cmxform" id="ValidateForm" method="post" action="#" autocomplete="off">

<fieldset>
<div class="3u 12u$(xsmall)">
<p>

<input id="name" name="name" type="text"  placeholder="Name"></input>

</p>
<br></div>
<div class="3u 12u$(xsmall)">
<p>
<input id="mobile" name="mobile" type="text" placeholder="Mobile number"></input>

</p><br></div>
<div class="3u 12u$(xsmall)">
<p>
	<input id="email" name="email" type="email" placeholder="Email"></input>
</p>
<br></div>
<div class="3u 12u$(xsmall)">
<p>
	<input id="password" name="password" type="password" placeholder="Password"></input>

</p><br></div>
<div class="3u 12u$(xsmall)">
<p>
	<input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password"></input>

</p><br></div>
<div class="3u 12u$(xsmall)">
<p>
	<input id="address" name="address" type="text" placeholder="Address"></input>
</p><br></div>
<div class="3u 12u$(xsmall)">
<p>
<input id="pincode" name="pincode" type="text" placeholder="Pincode"></input>

</p><br>
<p>
<input id="agree" name="agree" type="checkbox"></input></p>
</div>

<input type='submit' name="submit" value="Register now" class='btn btn-success'>
<input type="reset" class='btn btn-danger'>

</fieldset>

</form>
<?php   
if(isset($_POST["submit"]))
{
$name=$_POST['name'];
$mno=$_POST['mobile'];
$email=$_POST['email'];
$pass=$_POST['confirm_password'];
$addr=$_POST['address'];
$pcode=$_POST['pincode'];
	
	if($emailcount>0){
		echo "<script>alert('email already exists')</script> ;";
	}
	if(mysqli_query($con,"insert into regis (name,mno,email,pass,addr,pcode,role) values('$name',$mno,'$email','$pass','$addr',$pcode,'buyer')")){
			echo "<script>alert('Registration successfull!!!!');</script>";
			echo "<script>window.location.assign('login.php');</script>";
		}
			else{
			echo "<script>alert('Could not register!!!!');</script>";
			}
}
?>
</body>
</html>
<?php
include "footer.php";
?>