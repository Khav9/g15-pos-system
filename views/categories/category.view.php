<?php
if (!isset($_SESSION['user'])) {
    header('Location: /');
    die();
}
require "layouts/header.php";
require "layouts/navbar.php";
$user = $_SESSION['user'];
?>
<!-- Begin Page Content -->

<script src="/vendor/search_categorye/search_vendor.js"></script>
<link rel="stylesheet" href="/vendor/alerts.categoty/alerts.category.css">
<!-- <link rel="stylesheet" href="/vendor/alerts.categoty/alerts.category.error.css"> -->
<script src="/vendor/alerts.categoty/alerts.category.js" defer></script>

<div class="container-fluid">

    <!-- notification -->
    <div class="notification">
        <?php if (isset($_SESSION['success-category'])) : ?>
            <div class="alert alert-success alert-dismissible fade show toast d-flex align-items-center" id="alertCategory" role="alert">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
                <div class="d-felx justify-content-center">
                    <!-- <h6>News</h6> -->
                    <p><?= $_SESSION['success-category'] ?></p>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
            unset($_SESSION['success-category']);
        endif;
        ?>
        <?php if (isset($_SESSION['error-category'])) : ?>
            <link rel="stylesheet" href="/vendor/alerts.categoty/alerts.category.error.css">

            <div class="alert alert-warning alert-dismissible fade show toast d-flex align-items-center" id="alertCategory" role="alert">
                <i class="fa fa-exclamation-triangle" id="catWarning" aria-hidden="true"></i>
                <div class="d-felx justify-content-center">
                    <!-- <h6>News</h6> -->
                    <p class="text">Please fill all information !</p>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
            unset($_SESSION['error-category']);
        endif;
        ?>
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between m-0">
                    <form id="searchForm" class="he">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary" id="basic-addon1">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                            <input type="text" name="search" id="searchInput" class="form-control" placeholder="Searh " aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </form>
                    <?php if ($user[5] === 'admin') : ?>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square mr-3"></i>Create Category</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <?php if ($user[5] === 'admin') {
                                    echo '
                                    <th>Action</th>
                                    ';
                                }; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $categories = getCategories();
                            foreach ($categories as $key => $category) {
                            ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $category['categoryName'] ?></td>
                                    <td><?= $category['description'] ?></td>
                                    <?php if ($user[5] === 'admin') : ?>
                                        <td class="d-flex justify-content-between align-items-center pt-0 pb-1">
                                            <a href="/categoryUpdate?id=<?= $category['id'] ?>" data-toggle="modal" data-target="#editCategory<?= $category['id'] ?>"><i class="fa fa-pen"></i></a>
                                            <a href="controllers/categories/category.delete.controller.php?id=<?= $category['id'] ?>" class="text-danger p-2" data-toggle="modal" data-target="#deleteCategory<?= $category['id'] ?>"><i class="fa fa-trash"></i></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <!-- The Modal edit-->
                                <div class="modal" id="editCategory<?= $category['id'] ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-primary text-white">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Update Category</h4>
                                                <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="controllers/categories/category.update.controller.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                                    <div class="form-group">
                                                        <label for="inputAddress">Category Name</label>
                                                        <input type="text" class="form-control" id="inputAddress" Name="name" value="<?= $category['categoryName'] ?>">
                                                    </div>
                                                    <div class="form-row">

                                                        <label for="inputEmail4">Description</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?= $category['description'] ?></textarea>

                                                    </div>
                                                    <div class="form-row d-flex justify-content-between mt-3">
                                                        <a href="/categories" class="btn btn-danger">Cancel</a>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Modal footer -->

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal delete-->
                                <div class="modal fade" id="deleteCategory<?= $category['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delet "<span class="text-primary"><?=$category['categoryName']?></span> " ?</p>
                                            </div>
                                            <form action="controllers/categories/category.delete.controller.php" class="modal-footer" method="post">
                                                <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            };
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- The Modal create-->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content bg-primary text-white">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Create New Category</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="controllers/categories/insert.category.controller.php" method="post">
                                <div class="form-group">
                                    <label for="inputAddress">Category Name</label>
                                    <input type="text" class="form-control" id="inputAddress" Name="categoryName">
                                </div>
                                <div class="form-row">

                                    <label for="inputEmail4">Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>

                                </div>
                                <div class="form-row d-flex justify-content-between mt-3">
                                    <a href="/categories" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </form>
                        </div>

                        <!-- Modal footer -->

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php require "layouts/footer.php"; ?>