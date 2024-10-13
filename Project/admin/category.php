<?php 
 require_once('include/header.php');
if(!isset($_SESSION['email'])){
    header('location: signin.php');
}

?>



<div class="container-fluid mt-2">
     <div class="row">
           <div class="col-md-3 col-lg-3">
            <?php require_once('include/sidebar.php'); ?>
        </div>
      
        <?php
        if(isset($_GET['del'])){
            $del   = $_GET['del'];
            $query = "DELETE FROM categories WHERE id = $del";
            $run   = mysqli_query($con,$query);
        }
        
         ?>
        <div class="col-md-9 col-lg-9">
           
               <div class="col-md-9">
                <div class="row">
                  <div class="col-md-1">
                    <i class="fad fa-th-list fa-6x text-primary"></i>
                  </div>
                  <div class="col-md-11 text-left mt-4">
                  <h1 class="ml-5 display-4 font-weight-normal">View Product Categories:</h1>
                  </div>
                </div>
              <hr>
                   <form action="" method="post">
                    <div class="row">
                    <?php
                        if(isset($_POST['add'])){
                           $category = $_POST['category'];
                             if($run = mysqli_query($con,"insert into category (cname) values ('$category')"))
                             {
                              echo "<script>alert('Category added successfully');</script>";
                             }
                          
                        } 
                        if(isset($_POST['delete'])){
                          $cid = $_POST['cid'];
                            if(mysqli_query($con,"delete from category where cid=$cid"))
                            {
                             echo "<script>alert('Category deleted successfully');</script>";
                            }
                         
                       } 
                    ?>
                    
                   <div class="col-lg-8">
                     <div class="row">
                       <div class="col-lg-6">
                        <form action="#" method="POST">
                        <input type="text" name="category" class="form-control" placeholder="Add Category">
                      
                       </div>

                     </div>
                   </div>
                    <div class="col-lg-4">
                    <input type="submit" name="add" class="btn btn-primary" value="Add cat">
                       </div><br/>
                       
                       </div>
                    </form>
                    <?php
             $r_data = 6;
             $pquery = "SELECT * FROM category";
             $prun   = mysqli_query($con,$pquery);
             $prow   = mysqli_num_rows($prun);
             $page   = ceil($prow / $r_data);
             
            if(isset($_GET['tdata_id'])){
                 $t_id =$_GET['tdata_id'];
             }
            else {
                $t_id =1;
            }
            $pro_start = ($t_id - 1) * $r_data;  
            $query=" SELECT * FROM category ORDER BY cid ASC LIMIT $pro_start,$r_data";
            $run = mysqli_query($con,$query);
            if(mysqli_num_rows($run) > 0){
            ?>
              <!-- Button to Open the Modal -->
       
        <div class="row mt-5">  
            <div class="col-md-12 col-lg-12">

              
             <table class="table table-hover">
                <thead class="thead-dark">
                   <tr>
                    
                    <th>ID</th>
                   
                    <th>Categories</th>
                    <th class="text-center">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                 <?php
                
                    while($row = mysqli_fetch_array($run)){
                        $id = $row['cid'];
                        $category = ucfirst($row['cname']);
                      ?>
                     <tr>                     
                        <td><?php echo $id;?></td>
                        <td><?php echo $category;?></td>
                        <td class="text-center">
                          <form action='#' method="POST">
                       <input type="submit" name='edit' value="Edit" class="btn btn-primary">
                      <input type="submit" name='delete' value="Delete" class="btn btn-danger">
                      <?php echo "<input type='hidden' name='cid' value= $id >";?>
                    </form>

                        </td>
                     </tr>
                      <?php
                    }
                
                    ?>
                </tbody>
             
              </table>
                
                    <ul class="pagination">
                       <?php for($i=1; $i<= $page; $i++)
                        {
                        echo "<li class='page-item ".($t_id == $i ? 'active' : ''). "'><a class='page-link' href='category.php?tdata_id=".$i."'>$i</a></li>";
                    }
                        ?>
                    </ul>
                
             </div>
                      </div>
                  <?php
            }
             
            ?>    
        </div>
        
     </div>
         <!---edit category query-->
      
            <!-- Modal -->

      </div>
     