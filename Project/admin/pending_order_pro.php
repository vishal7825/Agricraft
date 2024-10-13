<?php include("include/header.php");
  if(!isset($_SESSION['email'])){
    header('location: signin.php');
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
                <i class="fad fa-box-alt fa-6x text-warning"></i>
              </div>
              <div class="col-md-11 text-left mt-4 ">
               <h1 class="ml-3 display-4 font-weight-normal">Pending Orders:</h1>
              </div>
            </div>
            <hr>
        <form method="post">
         <table class="table table-responsive table-hover ">
                      <thead class="thead-light">
                          <tr>
                             
                              <th>Order ID</th>
                              <th>Product_id</th>
                              <th>Product Image</th>
                              <th>Product Category</th>
                              <th>Customer Id</th>
                              <th>Price (Rs)</th>
                              <th>Quantity</th>
                              <th>Order_Status</th>
                              <th>Order_Date</th>
                              <th>Change Status </th>
                              
                          </tr>
                      </thead>
                       <tbody class="text-center">
                          <?php
                          
                                    $order_query = "SELECT * FROM checkout WHERE status='ordered'";
                                    $run = mysqli_query($con,$order_query);
                                
                                    if(mysqli_num_rows($run) > 0){
                                        while($order_row = mysqli_fetch_array($run)){
                                            $order_id      = $order_row['oid'];
                                            $cust_id       = $order_row['cusid'];
                                            $order_pro_id  = $order_row['pid'];
                                            $order_qty     = $order_row['qty'];
                                            $order_amount  = $order_row['totalprice'];
                                            $order_date    = $order_row['date'];
                                            $order_status  = $order_row['status'];

                                             $pr_query = "SELECT * FROM product  WHERE pid = $order_pro_id ";
                                             $pr_run   = mysqli_query($con,$pr_query);
                                                
                                             if(mysqli_num_rows($pr_run) > 0){
                                                    while($pr_row = mysqli_fetch_array($pr_run)){
                                                    $pid   = $pr_row['pid'];
                                                    $image = $pr_row['photo'];
                                                    $category = $pr_row['cid'];
                                            
                                              
                            ?> 
                             <tr>
                                
                                 <td>
                                 <?php echo $order_id;?>
                                 </td>
                                 <td>
                                     <?php echo $order_pro_id;?>
                                 </td>
                                 <td width="120px">
                                     <img src="../client/images/productImages/<?php echo $image;?>" width="100%">
                                 </td>
                                 <td>
                                     <?php echo $category;?>
                                 </td>
                                 <td>
                                    <?php echo $cust_id;?>
                                 </td>
                                
                                 <td>
                                    <?php echo $order_amount;?>
                                 </td>

                                 <td><?php echo $order_qty;?></td>

                                <td>
                                   
                                <?php 
                                   if($order_status == 'ordered'){
                                     echo "<i class='fas fa-exclamation-circle text-warning'></i> Pending";
                                   }
                                   ?>
                                
                               </td>
                               <td><?php echo $order_date;?></td>
                               <td> <?php
                               if($order_status == 'ordered'){
                                     echo "<form action='#' method='POST'>
                                     <input type='submit' name='confirm' value='Confirm order' class='btn btn-primary'>
                                     <input type='hidden' name='oid' value='$order_id'>
                                     </form>";
                                   }
                                   if(isset($_POST['confirm']))
                                  {
                                     $oid=$_POST['oid'];
                                     mysqli_query($con,"update checkout set status='confirmed' where oid='$oid'");
                                        echo "<script>alert('Successfully confirmed!!!!!');</script>";
                                        echo "<script>window.location.assign('index.php');</script>";
                                        $fetch=mysqli_query($con,"select * from stock where pid='$pid'");
                                        while($data=mysqli_fetch_array($fetch)) 
                                        {
                                          $qt=$data['qty'];
                                        }
                                        $qtt=$qt-$order_qty;
                                        mysqli_query($con,"update stock set qty='$qtt' where pid='$pid'");
                                  }?></td>
                             </tr>   
                           <?php 
                                  }
                                }
                                 
                               
                              } 

                            }else {
                                echo "<tr><td colspan='12'><h2 class='text-center text-secondary'>You have not any pending order</h2></td></tr>";
                                }
                                

                    ?>
                              
                          
                      </tbody>
                  </table>

                  <div class="text-right">
                    
                  </div>
                  
            </form>
        </div>



    </div>
</div>
