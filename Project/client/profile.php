<?php 
session_start();
include "menu.php";
include "conn.php";
include "head.php";
if(isset($_SESSION['email'])){
   
    $session_email = $_SESSION['email'];
   
}
?>
<div class="container-fluid mt-2">
     <div class="row">
           <div class="col-md-3 col-lg-3">
          
            </div>
        
            <div class="col-md-9 col-lg-9">

               <div class="row">
                  <div class="col-md-1">
                    <i class="fad fa-user-cog fa-6x text-primary"></i>
                  </div>
                  <div class="col-md-11 text-left mt-4">
                  <h1 class="ml-5 display-4 font-weight-normal">Profile Setting:</h1>
                  </div>
                </div>
              <hr>

              <!-- Extended material form grid -->
            
                <?php
                 $query = "SELECT * FROM regis WHERE email='$session_email'";
                 $run   = mysqli_query($con,$query);
                 $row   = mysqli_fetch_array($run);
                    
                    $db_name         = $row['name'];
                    $db_email        = $row['email'];
                    $db_password     = $row['pass']; 
                    $db_addr    = $row['addr'];     
                    
                 
                 
                 if(isset($_POST['submit']))
                 {  
                     $name=$_POST['name'];
                     $password=$_POST['password'];   
                     $addr=$_POST['addr'];                  
                   
                     
                     
                      if(mysqli_query($con,"update regis set name='$name', pass='$password',addr='$addr' where email='$session_email'")){
                         echo "<script>alert('Profile has been updated!!');</script>";
                         
                          
                     }
                 }
                 ?>
                 <div class="row">
                  <?php if(isset($message)){
                        echo "<p style='color:green; font-weight:bold;'>$message</p>";
                    }?>
                   <div class="col-md-12 mt-4">
                      <label for="name" class="font-weight-bold">Email:</label> <?php echo $db_email;?>
                    </div>
                  </div>
                 
                  
                  <div class="row mt-4">
                    <div class="col-md-6">
                      <div class="form-group">
                      <form method="post" action='#' >
                        <label for="name" class="font-weight-bold">Name:</label>
                        <input type="text" name="name" value="<?php echo $db_name;?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="name" class="font-weight-bold">Password:</label>
                        <input type="password" name="password" value="<?php echo $db_password;?>" class="form-control" id="inputPassword4MD" placeholder="Password">
                      </div>

                      <div class="form-group">
                        <label for="name" class="font-weight-bold">Address:</label>
                        <input type="text" name="addr" value="<?php echo $db_addr;?>" class="form-control" id="inputPassword4MD" placeholder="Password">
                      </div>
                    </div>
                  
                   
                    
                  </div>
                  
                  <input type="submit" name="submit" class="btn btn-primary btn-md" value="Update Profile">
                </form>
            </div>
    </div>
                <!-- Extended material form grid -->
            </div><br><br>

     <?php 
     include "footer.php";
?>