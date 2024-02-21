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
<div class="container-fluid">
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
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square mr-3"></i>Create Category</a>
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
                                <th>Action</th>
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
                                    <td class="d-flex justify-content-between align-items-center pt-0 pb-1">
                                        <a href="/categoryUpdate?id=<?= $category['id'] ?>"><i class="fa fa-pen"></i></a>
                                        <a href="delete" class="text-danger p-2" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
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
                    <div class="modal-content">

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
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>

                        <!-- Modal footer -->

                    </div>
                </div>
            </div>

            <!-- delete -->
            <div class="modal" id="deleteModal" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content border-bottom-danger">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this category ?</p>

                        </div>
                        <div class="modal-footer">
                            <form action="controllers/categories/category.delete.controller.php?id=<?= $category['id'] ?>" method="post">
                                <button type="button" class="btn btn-secondary btn-circle" data-dismiss="modal"><i class="fa fa-times-circle"></i></button>
                                <input type="hidden" value="<?= $category['id'] ?>" name="id">
                                <button type="submit" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- /.container-fluid -->
<?php require "layouts/footer.php"; ?>