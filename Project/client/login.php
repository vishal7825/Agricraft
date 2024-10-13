<?php
session_start();
require 'menu.php';
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include "head.php";
    ?>
</head>
<body >
    <center>
        <br><br>
<div class="container pt-4">
    <h2>Login</h2>
							<form method="post" action="#">
								<div class="column">
									<div class="7u$">
										<input type="email" name="email" id="email" value="" placeholder="Email" style="width:80%" required/>
									</div>
                                    <br>
									<div class="7u$">
										<input type="password" name="pass" id="pass" value="" placeholder="Password" style="width:80%" required/>
									</div>
								</div>  
                                <br>
									
									<div class="column">
										<div class="7u 12u$(small)">
											<Button name="submit" class='btn btn-primary'>Login</button>
										</div>
                                        </form>
									</div>
										<br>
                                    <div>
                                    NEW USER!!!
                                    <a href="register.php">sign up</a>
                                    </div>				
							</div>
	<?php
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $result=mysqli_query($con ,"select * from regis where email='$email'");
    
    if($data=mysqli_num_rows($result)>0)
    {
        $data=mysqli_fetch_array($result);
       
        if($pass == $data["pass"])
        {
            $_SESSION["role"]=$data["role"];
            $_SESSION["name"]=$data["name"];
            $_SESSION["email"]=$data["email"];
            $_SESSION["mno"]=$data["mno"];
            $_SESSION["cusid"]=$data["cusid"];
            $_SESSION["address"]=$data["addr"];
            echo "<script>alert('Login successfully!!!!!');</script>";
            echo "<script>window.location.assign('index.php');</script>";
        }
        else 
        echo "<script>alert('Incorrect password!!!!!');</script>";
    }
    else
    {
        echo "<script>alert('Wrong username!!!');</script>";
    }
}
?>
<br>
</body>
</html>
<?php
include "footer.php";
?>