<?php
session_start();

require 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include "head.php";
include "conn.php";
?>
</head>
<body >
<form method="post" action="#">
        <section id="main" class="wrapper">
            <div class="inner">
				<div class="container" style="width: 70%">
				<div class="row uniform">
					<div class="9u 12u$(small)">

					</div>
					<div class="3u 12u$(small)">
						<a href="" class="button special fit">Contact us</a>
					</div>
				</div>
				<br />
                <div class="box">
                    <div class="row uniform">
                        <div class="12u$">
                            <input type="text" name="email" id="blogTitle" value="" placeholder="Email" required/>
                        </div>
                       	<div class="12u$">
							<textarea name="message" id="blogContent" rows="12" placeholder="Message"></textarea>
						</div>
						<br>
						<div class="12u$">
						<center>
							<input type="submit" name="submit" class="button special" value="SUBMIT"/>
						</center>
						</div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <?php
    
if(isset($_POST['submit']))
{
    if(isset($_SESSION['email']))
    {
    $email=$_POST['email'];
    $message=$_POST['message'];
    $date=date('Y-m-d H:m:s');
    if(mysqli_query($con,"insert into contact (email,message,date) values ('$email','$message','$date')")){
        echo "<script>alert('Message sent successfully!!!!');</script>";
        echo "<script>window.location.assign('index.php');</script>";
    }
        else{
        echo "<script>alert('we can't send message at moment!!!!');</script>";
        }

    }
    else
    {
        echo "<script>alert('You must ave to loin first!!!!');</script>";
        echo "<script>window.location.assign('login.php');</script>";
    }
}
?>
		<script>
			 CKEDITOR.replace( 'blogContent' );
		</script>

		<!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>


</body>
</html>
<?php
include "footer.php";
?>