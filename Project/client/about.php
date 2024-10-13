<?php
session_start();
require 'menu.php';
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php

include "head.php";

?>
</head>
    
<body>
    <!-- About Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                
                <h1 class="display-4 text-uppercase">Welcome To AgriCraft</h1>
            </div>
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="images/logo2.png" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pb-5">
                    <h4 class="mb-4">Agricraft is a online platform that provide two main Roles,Farmer and Buyer.</h4>
                    <p class="mb-5"> where the farmer can upload his own product and sell it at a price that suits him and buyer too, on the other hand, the buyer can only see the product uploaded by the farmer and buy it. Yes, there is no third party between them. This website will work like a strong chain between farmer and consumer.</p>
                    <div class="row g-5">
                        <div class="col-sm-6">
                            <div class="" style="width: 120px; height: 120px;">
                            <img class="position-absolute" src="images/health.png" height='110px;' width='120px' style="object-fit: cover;">   
                            <i class="fa fa-heartbeat fa-2x text-white"></i>
                            </div>
                          <b>  <h4 class="text-uppercase">100% Healthy</h4> </b>
                            <p class="mb-0">Agricraft provide 100% healthy and organic product,Good health is a blessing, don't take it for granted </p>
                        </div>
                        <div class="col-sm-6">
                        <div class="" style="width: 120px; height: 120px;">
                            <img class="position-absolute" src="images/award.png" height='110px;' width='120px' style="object-fit: cover;">   
                                  <i class="fa fa-award fa-2x text-white"></i>
                            </div>
                           <b> <h4 class="text-uppercase">Award Winning</h4></b>
                            <p class="mb-0">AgriCraft is  4 times Award winning.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- About End -->
</body>
</html>
<?php
include "footer.php";
?>