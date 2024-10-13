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
                <i class="fad fa-truck fa-6x text-primary"></i>
              </div>
              <div class="col-md-11 text-left mt-4">
               <h1 class="ml-5 display-4 font-weight-normal">Delivered Orders:</h1>
              </div>
            </div>
           <hr>

        <table class="table table-responsive table-hover ">
                      <thead class="thead-light">
                          <tr>
                            
                              <th>Order ID</th>
                              <th>Product_id</th>
                              <th>Product Image</th>
                              <th>Product Category</th>
                              <th>Customer Id</th>
                              <th>Price </th>
                              <th>Quantity</th>
                              <th>Order_Status</th>
                              <th>Order_Date</th>
                             
                              
                          </tr>
                      </thead>
                        <tbody class="text-center">
                          <?php
                                    $order_query = "SELECT * FROM checkout WHERE status='delivered'";
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

                                <td><?php echo"<i class='fad fa-truck text-primary'></i> ".ucfirst($order_status);?></td>
                                <td><?php echo $order_date;?></td>
                             </tr>   
                           <?php 
                                  }
                                }
                              }

                            }else {
                                echo "<tr><td colspan='12'><h2 class='text-center text-secondary'>You have not delivered any order</h2></td></tr>";
                               
                                }
                        
                     
                    
                    ?>
                              
                          
                      </tbody>
                    </form>
                  </table>

        </div>



    </div>
</div>
