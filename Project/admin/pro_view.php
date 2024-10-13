<?php include("include/header.php");?>
<?php
         if(!isset($_SESSION['email']))
          {
            header('location: signin.php');
          }

        if(isset($_POST['delete'])){
            $del   = $_POST['pid'];
           
            if(mysqli_query($con,"delete from product where pid='$del'")){
                echo "<script> alert('This product has been deleted');</script>";
        
            }
        }

       
 ?>
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-3">
            <?php include("include/sidebar.php");?>
        </div>
        
        <div class="col-md-9">
            
               <div class="row">

                 <div class="col-md-1">
                   <i class="fad fa-th-list fa-6x text-primary"></i>
                 </div> 

                 <div class="col-md-7">
                   <h2 class="display-4 ml-2 mt-4">View Agricraft Products:</h2>
                 </div> 
                 
            
                </div>
               <hr>
        <table class="table table-responsive table-hover ">
                      <thead class="thead-light">
                          <tr>
                              <th>Product Id</th>
                              <th>Image</th>
                              <th>Category</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Detail</th>
                              <th colspan="4">Actions(Edit/Del)</th>
                              <th colspan="4"></th>
                          </tr>
                      </thead>
                        <tbody>
                          <?php


                                           $pr_query = "SELECT * FROM product  order by pid";
                                      
                                      
                                        $pr_run   = mysqli_query($con,$pr_query);
                                        
                                        if(mysqli_num_rows($pr_run) > 0){
                                            while($pr_row = mysqli_fetch_array($pr_run)){
                                              $pid   = $pr_row['pid'];
                                              $category = $pr_row['cid'];
                                              $price = $pr_row['price'];    
                                              $detail  = $pr_row['descr'];
                                              $image = $pr_row['photo'];
                                              $qt=mysqli_query($con,"select * from stock where pid='$pid'");
                                              if(mysqli_num_rows($qt) > 0){
                                                while($data = mysqli_fetch_array($qt)){
                                                      $qty=$data['qty'];
                                                }
                                              }
                                            
                                              
                            ?> 
                             <tr>
                                 <td >
                                     <?php echo $pid;?>
                                 </td>
                                 <td width="120px">
                                     <img src="../client/images/productImages/<?php echo $image;?>" width="100%">
                                 </td>


                                 <td>
                                    <?php echo $category;?>
                                 </td>

                                 <td><?php echo $price;?> </td>
                                 <td> 
                                 <?php echo $qty ?>  
                                </td>
                                 <td> 
                                 <?php echo $detail ?>  
                                </td>
                                
                                <td colspan="20" class="text-center"> 
                                 <?php 
                                   
                                   
                                   ?>
                                   <form action="#" method="POST">
                                   <input type="submit" class="btn btn-primary" name="edit" value="Edit" >
                                   <input type="submit" class="btn btn-danger" name="delete" value='Delete'>
                                   <?php echo "<input type='hidden' value='$pid' name='pid' >";?>
                                            </form>
                                 </td>
                             </tr>   
                           <?php 
                               }

                            }else {
                                echo "<h2 class='text-center text-secondary'>You haven't added any product yet</h2>";
                                }
                        
                     
                    
                    ?>
                              
                          
                      </tbody>
                  </table>

        </div>



    </div>
</div>
