<?php
if (!isset($_SESSION['user'])) {
    header('Location: /');
    die();
}
require "layouts/header.php";
require "layouts/navbar.php";

?>

<script src="/vendor/search_product/search_product_vendor.js" defer></script>

<form id="searchForm" class=" ml-3">
    <h2 class="ml-2">Expiration Notification</h2> 
    <div class="row-3 d-flex mr-2">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Expire Today
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               <?php 
                               if ($user[5] === 'admin'){
                                   echo $numberOfExpire;
                               }else{
                                echo $numberOfExpireTodayUser;
                               }
                               ?>
                            </div>
                        </div>
                        <div class=" col-auto">
                            <i class="fa fa-cart-arrow-down fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Expire in 7 days</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               <?php 
                               if ($user[5] === 'admin'){
                                   echo $numberOfExpireSevenDay;
                               }else{
                                echo $numberOfExpireSevenDayUser;
                               }
                               ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-calendar-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Expire in 1 months</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                               <?php 
                               if ($user[5] === 'admin'){
                                   echo $numberOfExpireOneMonth;
                               }else{
                                echo $numberOfExpireOneMonthUser;
                               }
                               ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                                <i class="far fa-calendar-alt fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</form>
<div class="container-fluid col-14 mt-4">
    <h6>Expiration Details</h6>
    <table class="table">
        <thead class="bg-primary text-white">
            <tr>
                <th>Product</th>
                <th>Stock QTY</th>
                <th>Expiry Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                
            </tr>
        </tbody>
    </table>
</div>
<?php require "layouts/footer.php"; ?>