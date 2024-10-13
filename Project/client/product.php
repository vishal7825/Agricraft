<?php 
session_start(); 
require 'menu.php';
include "conn.php";
include "head.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
  <script>

$(document).ready(function(){
    $("#product").change(function(){
        let xhttp=new XMLHttpRequest();
        let image=$("#product").val();

xhttp.onreadystatechange=function(){
    if(xhttp.readyState == 4 && xhttp.status==200)
    {
        $("#image").html(xhttp.responseText);
    }
};
xhttp.open("GET","productcheck.php?sproduct="+ image , true)
xhttp.send();
    });
});


    </script>
	</head>
		<body>
			<center>
      <br>
      <h1>Select category:</h1>
      <div class="container">
      <div class="row">
      <div class="col-ld-6">
      <?php
      $result=mysqli_query($con,"select * from category");
      echo "<form action='#' method='POST'>";
      echo " <select name='product' id='product''>";
      echo "<option value='all' >- Category -</option>";
      while($data= mysqli_fetch_array($result))
								{
								 echo " <option value='$data[0]'>$data[1]</option>";
								}
                echo "</select></form>";
      ?>
      </div></div></div>
   
<div id="image">
<?php
$result=mysqli_query($con,"select * from product");
echo "<div class='container'>";
echo "<div class='row row-cols-1 row-cols-lg-3'  width='100%'>";
while($data= mysqli_fetch_array($result))
{   
  echo "<div class='col'><br> ";
  echo "<form action='details.php' method='POST'>";
  echo "<img src='images/productImages/". $data[5] . "' name='$data[0]' width='220px' height='250px' alt='...'>";
  echo "<h2>".$data[2]."</h2>";
  $dis=$data[4]*3/100;
  $or=$dis*$data[4]/100;
  $strk=$data[4]+$or;
  echo "<h3 style='color:green'>$dis % off</h3>";
  echo "<h3>Only on Rs.<strike style='color:red'>".$strk."</strike><br>".$data[4]."(kg)</h3>";
  echo "<input type='submit' value='Show Detail' class='btn btn-info'>";
  echo"<input type='hidden' name='pid' value='$data[0]'>";
echo "</form></div>";
}
echo "</div></div><br>";

?>
</div>

<?php
include "footer.php";
?>
	</body>
</html>