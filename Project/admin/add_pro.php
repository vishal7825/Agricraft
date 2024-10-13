<?php 
 require_once('include/header.php');
 if(!isset($_SESSION['email'])){
  header('location: signin.php');
}
if(isset($_SESSION['email'])){
       $session_email = $_SESSION['email'];
    $session_name = $_SESSION['name'];
}
?>



<div class="container-fluid mt-2">
    <script src="ckeditor/ckeditor.js"></script>
      <div class="row">
        <div class="col-md-3 col-lg-3">
            <?php require_once('include/sidebar.php'); ?>
        </div>
        
        <div class="col-md-9 col-lg-9">
          <form method="post" enctype="multipart/form-data">
             <?php
                    if(isset($_POST['submit'])){ 
                    $title      = $_POST['title'];
                    $size       = $_POST['size'];
                    $price      = $_POST['price'];
                    $date       = date("d-m-Y");
                    $status     = $_POST['status'];
                    $category   = $_POST['category'];
                    $detail     = $_POST['detail'];
                    $image      = $_FILES['upload']['name'];
                    $tmp_image  = $_FILES['upload']['tmp_name'];
                        
                    if(!empty($title) or !empty($size) or !empty($price) or !empty($status) or !empty($category) or !empty($detail) or !empty($image)){
                     $query = "INSERT INTO furniture_product(`title`, `category`, `size`, `price`, `detail`, `image`, `date`, `status`)
                      VALUES('$title',$category,'$size',$price,'$detail','$image','$date','$status')";
                     
                        if(mysqli_query($con,$query)){
                            $path = "img/".$image;
                            
                            if(move_uploaded_file($tmp_image,$path) == true){
                                copy($path,"../".$path);
                              
                                $msg = "Furniture Product Has Been Published";
                            }
                        }
                                              
                    }
                                   
                }

                 if(isset($msg)){
                  echo "<span class='mt-3 mb-4' style='color:green; font-weight:bold;'><i style='color:green; font-weight:bold;' class='fas fa-smile'></i> $msg</span>";
                 }
                    ?>
       
            <div class="row">
                <?php if(isset($message)){
                        echo "<p style='color:green; font-weight:bold;'>$message</p>";
                    } else if(isset($error)){
               echo "<span style='color:red; font-weight:bold;'><i style='color:red; font-weight:bold;' class='fas fa-frown'></i> $error</span>";
                    }?>
                    <!-- Grid column -->
                    <div class="col-md-12">
                      <div class="form-group">
                      <form method="POST" action="#" enctype="multipart/form-data">
                       <label for="furniture">Add product:</label>
                       <input type="text" class="form-control" name="pname" id="inputEmail4MD" placeholder="Product name">
                      </div>
                    </div>
                  
            </div>
                  
              <div class="row">
                    <div class="col-md-3">
                      <label for="category">Category:</label>
                      <select class="form-control" name="type">
                        <?php
                       $cat_run   = mysqli_query($con,"select * from category");
                        if(mysqli_num_rows($cat_run) > 0){
                          While($cat_row = mysqli_fetch_array($cat_run)){
                            $cat_id   = $cat_row['cid']; 
                            $cat_name = $cat_row['cname'];
                            echo "<option value='$cat_id'>$cat_name</option>";
                          }

                        }
                        else{
                          echo " <option> No Category </option>";
                        }
                        ?>
                         
                       </select>
                      
                    </div>
                    <!-- Grid column -->
                    <div class="col-md-3">
                      <div class="form-group">
                      <label for="size">Product Quantity:</label>
                       <input type="text" class="form-control" name="size"  placeholder="in K.G.">
                      </div>
                    </div>
                    <!-- Grid column -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="size">Product Price:</label>
                        <input type="text" class="form-control" name="price"  placeholder="R.S.">
                      </div>
                    </div>

                   
                    
              </div> 
                       
              <div class="row">
                <div class="col-md-12">
                  <textarea name="pinfo" placeholder='Product details' rows="4" cols="100"></textarea>
                </div>
              </div>
                  
              <div class="row mt-3">
                <div class="col-md-6">      
                  <span>Choose files</span>
                     <input type="file" name="productPic" class="form-control-file border" >
                </div>

                
              </div>
              
              <input type="submit" name="add" class=" mt-3 btn btn-primary btn-md" value="Submit">
                  
            </form>
        </div>
        
     </div>
     <?php
     if(isset($_POST["add"]))
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
				$picDestination = "../client/images/productImages/".$picNameNew;
				move_uploaded_file($picTmpName, $picDestination);
				
			}
		}
    
	
$pname=$_POST['pname'];
$cat=$_POST['type'];
$descr=$_POST['pinfo'];
$price=$_POST['price'];
$qty=$_POST['qty'];
	if(mysqli_query($con,"insert into product (cid,pname,descr,price,photo) values ('$cat','$pname','$descr',$price,'$picNameNew')")){
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
<script>
 CKEDITOR.replace('detail', {
    filebrowserBrowseUrl: '/brows.php',
    filebrowserUploadUrl: '/upload.php'
});
</script>
      </div>
     