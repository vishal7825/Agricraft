<!DOCTYPE html>
<html lang="en">
	<head>
       
	</head>
	
		<!-- Footer -->
		<footer class="footer-distributed" style="background-color:black" id="aboutUs">
		<div class="footer-left">
			<h3 style="font-family: 'Times New Roman', cursive;">&copy; Agricraft  </h3>
			<br />
			<p style="font-size:20px;color:white">Easy to purchase !!!</p>
			<br />
			<h3 style="font-family: 'Times New Roman', cursive;">Developer contact </h3>
			<br />
			<div>
					<p style="font-size:20px;color:white">+91 6354591336 </br>+91 7567770162</p>
			</div>
			<br />
		</div>

		<div class="footer-center">
			<div>
				<i class="fa fa-map-marker"></i>
				<p style="font-size:20px">Shop address<span>Jasdan</span></p>
			</div>
			<div><br>
				<i class="fa fa-phone"></i>
				
				
				<p style="font-size:20px">+91 7878787878</p>
			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<p style="font-size:20px"><a href="mailto:agricraft@gmail.com" style="color:white">agricraft@gmail.com</a></p>

			<div>
			</br></br></br></br>
					<p><b>&copy;Agricraft 2023 Powerd By Agricraft-All rights reserved || Developed By: Vishal Bavaliya & Kukadiya Jaypal </b></p>
			</div>
				
			</div>
		</div>
	
		<div class="footer-right">
			<p class="footer-company-about" style="color:white">
				<span style="font-size:20px"><b><u>About Agricraft</b></u></span>
				Agricraft is e-commerce trading platform for grains & grocerries...
			</p>
			<div class="footer-icons">
			<b><u><p> Follow Us</p></u></b>
				<a  href="#"><i style="margin-left: 0;margin-top:5px;"class="fa fa-facebook"></i></a>
				<a href="https://instagram.com/gujaratfarmers?igshid=MzRlODBiNWFlZA=="><i style="margin-left: 0;margin-top:5px" class="fa fa-instagram"></i></a>
				<a href="https://youtube.com/@jaypalkukadiya"><i style="margin-left: 0;margin-top:5px" class="fa fa-youtube"></i></a>
			</div>
		</div>

	</footer>
	<script>

$(document).ready(function(){
	
  $("#btnIncre").click(function(){
   let maxValue=<?php echo $maxValue; ?>;
	if(parseInt($("#qty").val()) >= maxValue)
	{
		$("#message").text("Out of stock!!");
		$("#btnIncre").prop("disabled",true);
	}
  else
  {
    $("#qty").val(parseInt($("#qty").val())+1);
  }
  });
  $("#btnDecre").click(function(){
    let maxValue=<?php echo $maxValue; ?>;
	if(parseInt($("#qty").val()) > 1)
	{
	$("#qty").val(parseInt($("#qty").val())-1);
	}
	if(parseInt($("#qty").val()) <= maxValue)
	{
		$("#message").text("");
		$("#btnIncre").prop("disabled",false);
	}
  });
});



</script>
	</body>
</html>
