<!DOCTYPE html>
				<header id="header">
				<a href="index.php"><image src="images/logo.png" height="60px" width="220px"></image>
				<nav id="nav">
					<ul>
						<li><a href="index.php"><span class="glyphicon glyphicon-home"> Home</a></li>
						
						<li><a href="about.php"><span class="glyphicon glyphicon">About</a></li>
						<li><a href="contact.php"><span class="glyphicon glyphicon">Contact</a></li>
						<li><a href="product.php"><span class="glyphicon glyphicon">Product</a></li>
					
						<?php
							if(isset($_SESSION["email"]))
							{
								?>
								<li><a href="cart.php"><span class="glyphicon glyphicon">cart</a></li>
								<li><a href="order.php"><span class="glyphicon glyphicon">order</a></li>
								<li><a href="profile.php"><span class="glyphicon glyphicon">Profile</a></li>
								<li><a href="logout.php"><span class="glyphicon glyphicon">Logout</a></li>
								<?php
							}
							?>
							
							<?php
							if(!isset($_SESSION["email"]))
							{
								?>
									<li><a href="login.php"><span class="glyphicon glyphicon">login</a></li>		
								<?php
							}
						?>
						
					</ul>
				</nav>
			</header>

	</body>
</html>
<?php
include "caro.php";
?>
