<?php
if (!isset($_SESSION['user'])) {

    header('Location: /');
    die();
}
require "layouts/header.php";
require "layouts/navbar.php";

?>

<!-- <script src="../../vendor/alerts/main.js" defer></script> -->
<script src="vendor/chart.js/chat.test.js" defer></script>

<!-- Begin Page Content -->

<div class="container-fluid">
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" id="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= $_SESSION['success'] ?>. Welcome <?=$user['userName']?> to POS SYSTESM
        </div>
    <?php
        unset($_SESSION['success']);
    endif;
    ?>
    <script>
        const hideAlert = document.querySelector('#alert');

        setTimeout(() => {
            hideAlert.classList.remove('show');
            hideAlert.classList.add('hide');
            location.reload();
        }, 2500);
    </script>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <?php
        if ($user[5] === 'admin') :
        ?>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-upload text-white-50" aria-hidden="true"></i> Export Data</a>
        <?php endif; ?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Export Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <a href="views/reports/generate.view.php" class="btn btn-primary btn-sm" id="export">Export</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- product in stock Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Product In Stock
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                if ($user[5] === 'admin') {
                                    echo $countProducts;
                                } else {
                                    echo $countProductsUser;
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
        <!-- qty in stock Card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Quantity In Stock
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                if ($user[5] === 'admin') {
                                    echo $productInStock;
                                } else {
                                    echo $productInStockUser;
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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Category
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        echo "$categoryInStock";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-th-large fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($user[5] === 'admin') :
        ?>
            <!-- user -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Users</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php

                                    echo "$amounUsers";
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-users fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- order in todya -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                if ($user[5] === 'admin') {
                                    echo $ordersAdmin;
                                } else {
                                    echo $ordersUser;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                if ($user[5] === 'admin') {
                                    echo '$ ' . $earningAmin;
                                } else {
                                    echo '$ ' . $earningUser;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <!-- <canvas id="myAreaChart"></canvas> -->
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if ($user[5] === 'admin') :
        ?>
            <div class="col-xl-8 col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Product Summary Today</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">New Product <span class="float-right"><?= $PercentNewProducts ?>%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?= $PercentNewProducts ?>%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">Expire Product<span class="float-right"><?= $PercentExpireProduct ?>%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $PercentExpireProduct ?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
require "layouts/footer.php";
?>