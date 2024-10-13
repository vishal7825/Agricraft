<?php 

include('include/header.php');

if(!isset($_SESSION['email'])){
    header('location:signin.php');
}
if(isset($_SESSION['email'])){
     $email = $_SESSION['email'];
    }

?>
  <div class="container-fluid mt-2">
      <div class="row">
       <!---sidenavbar Column-->
        <div class="col-md-3 col-lg-3">
            <?php require_once('include/sidebar.php'); ?>
        </div>
        <!---Main Column -->
        <div class="col-md-9 col-lg-9">
             <!-- Icon Cards-->
                <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fad fa-shopping-cart fa-2x" ></i>
                </div>
                <?php  
                   $query =  "SELECT * FROM checkout WHERE status='ordered'";
                   $run   = mysqli_query($con,$query);
                   $num_new_orders = mysqli_num_rows($run);
                 ?>
                <div class="mr-5">  <span style="font-size:24px;"><?php echo $num_new_orders;?></span> Pending Orders</div>

              </div>
              <a class="card-footer text-white clearfix small z-1" href="pending_order_pro.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fad fa-shopping-cart fa-2x" ></i>
                </div>
                <?php  
                   $query =  "SELECT * FROM checkout WHERE status='confirmed'";
                   $run   = mysqli_query($con,$query);
                   $num_new_orders = mysqli_num_rows($run);
                 ?>
                <div class="mr-5">  <span style="font-size:24px;"><?php echo $num_new_orders;?></span> confirmed Orders</div>

              </div>
              <a class="card-footer text-white clearfix small z-1" href="confirmed_order.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fad fa-truck fa-2x"></i>
                </div>
                <div class="mr-5">
                <?php  
                   $query = "SELECT * FROM checkout WHERE status='delivered'";
                   $run   = mysqli_query($con,$query);
                   $num_delivered_orders = mysqli_num_rows($run);
                 ?> 
                  <span style="font-size:24px;"><?php echo $num_delivered_orders;?> </span> Delivered Orders</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="delivered_pro.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fad fa-fw fa-users fa-2x"></i>
                </div>
                <div class="mr-5">
                <?php  
                   $query = "SELECT * FROM regis";
                   $run   = mysqli_query($con,$query);
                   $num_customer = mysqli_num_rows($run);
                 ?>
                   <span style="font-size:24px;"><?php echo $num_customer;?></span> Active Customers
                  </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="customers.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fad fa-sack fa-2x"></i>
                </div>
                <div class="mr-5">
                <?php  
                   $query = "SELECT SUm(totalprice) as 'earn' FROM checkout where status='delivered'";
                   $run   = mysqli_query($con,$query);
                   $row=mysqli_fetch_array($run);
                   $earning = $row['earn'];
                     
                 ?>
                  <span style="font-size:24px;"><?php echo $earning; ?></span> Rs. Earned
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
                  <h3 class="mt-5">New Customers</h3>
                  <table class="table table-responsive table-hover mt-3">
                      <thead class="thead-light">
                          <tr>
                              <th>#Id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>City</th>
                              <th>Pincode</th>
                              <th>View Complete</th>
                              
                          </tr>
                      </thead>
                        <tbody>
                          <?php     
                            $query = "SELECT * FROM regis ORDER BY cusid DESC LIMIT 5 ";
                            $run   = mysqli_query($con,$query);
                                        
                            if(mysqli_num_rows($run) > 0){
                              while($row = mysqli_fetch_array($run)){
                                $cust_id         = $row['cusid'];
                                $cust_name       = $row['name'];
                                $cust_email      = $row['email'];    
                                $cust_city       = $row['addr'];
                                $cust_postalcode = $row['pcode'];
                                                
                            ?> 
                             <tr>
                                 <td >
                                     <?php echo $cust_id;?>
                                 </td>

                                 <td width="150px">
                                    <?php echo $cust_name;?>
                                 </td>

                                 <td>
                                    <?php echo $cust_email;?>
                                 </td>

                                 <td> 
                                 <?php echo $cust_city ?>  
                                 </td>
                                 <td><?php echo $cust_postalcode;?></td>
                                 <td><a href="customers.php"><button class="btn btn-primary btn-sm">View Detail</button></td>
                            
                             </tr>   
                           <?php 
                               }

                            }else {
                              echo "<tr><td colspan='12'><h2 class='text-center text-secondary'>No Registered Customer Yet</h2></td></tr>";
                            }
                    ?>
      
                      </tbody> 
                  </table>   
          
        </div>
        </div>
  </div>

   

     

      
     