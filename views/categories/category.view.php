
<?php
if (!isset($_SESSION['user'])) {
      header('Location: /login');
      die();
}
require "layouts/header.php";
require "layouts/navbar.php";
$user = $_SESSION['user'];
?>
<!-- Begin Page Content -->
<link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/2.0.0/js/dataTables.min.js">
<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
        <div class="d-flex justify-content-between m-4">
            <input type="search" >
            <a href="/categoryCreate" class="btn btn-primary">Create New User</a>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Category</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $categories = getCategories();
                            foreach ($categories as $key => $category) {
                            ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$category['categoryName']?></td>
                                <td><?=$category['description']?></td>
                                <td class="d-flex justify-content-between">
                                    <a href="?id=<?= $category['id'] ?>" class="text-info p-2"><i class="fa fa-pen"></i></a>
                                    <a href="controllers/categories/category.delete.controller.php?id=<?= $category['id'] ?>" class="text-danger p-2"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- /.container-fluid -->
<?php require "layouts/footer.php";?>