<?php
if (!isset($_SESSION['user'])) {
    header('Location: /');
    die();
}
require "layouts/header.php";
require "layouts/navbar.php";
?>
<script src="/vendor/search_product/search_product_vendor.js" defer></script>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow ">
        <div class="d-flex justify-content-between align-items-center">
            <form id="searchForm" class=" ml-4">
                <div class="input-group">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="search" id="searchInput" class="form-control mt-4" placeholder="Search Product" />
                    </div>
                    <button type="button" class="btn btn-primary mt-4" data-mdb-ripple-init>
                        <i class="fas fa-search"></i>
                    </button>
                    <div class="input-group">
                    </div>
                </div>
            </form>
            <form action="#">
                <div class="col-md-12 d-flex mt-4">
                    <label class="d-flex pr-5">Fitter Product</label>
                    <select name="product" id="category">
                        <option value="All">All</option>
                        <?php foreach ($categories as $key => $category) : ?>
                            <option value="<?= $category['categoryName'] ?>"><?= $category['categoryName'] ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
            </form>
            <div class="mr-4 mt-4">
                <a href="/productCreate" class="btn btn-primary" data-toggle="modal" data-target="#createProduct"><i class="fa fa-plus-square mr-3"></i>Create Product</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Asign User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $products = getProducts(); // set it here it's okay. if set it on product.controller.php it's okay
                        foreach ($products as $key => $product) {
                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['price'] ?></td>
                                <td><?= $product['qty'] ?></td>
                                <td><?= $product['categoryName'] ?></td>
                                <td><?= $product['userName'] ?></td>
                                <td class="d-5">
                                    <a href="/productUpdate?id=<?= $product['id'] ?>" class="text-info p-2"><i class="fa fa-pen"></i></a>
                                    <a href="controllers/items/item.delete.controller.php?id=<?= $product['id'] ?>" class="text-danger p-2"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
            </div>
        </div>
        <!-- The Modal create-->
        <div class="modal" id="createProduct">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-info">Create New Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="controllers/items/insert_item.controller.php" method="post">
                            <div>
                                <div class="form-group">
                                    <label>Product Name:</label>
                                    <div>
                                        <input class="form-control " type="text" name="name" placeholder="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Price:</label>
                                    <div>
                                        <input class="form-control" type="text" name="price" placeholder="$">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Quantity:</label>
                                    <div>
                                        <input class="form-control" type="text" name="qty" placeholder="quantity">
                                    </div>
                                </div>
                                <select class="form-select form-select-sm" name="category" aria-label=".form-select-sm example">
                                    <option selected disabled>Categories</option>
                                    <?php foreach ($categories as $key => $category) : ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['categoryName'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <select class="form-select form-select-sm" name="asign" aria-label=".form-select-sm example">
                                    <option selected disabled>Asign Users</option>
                                    <?php foreach ($users as $key => $user) : ?>
                                        <option value="<?= $user['id'] ?>"><?= $user['userName'] ?></option>
                                    <?php endforeach ?>
                                </select> <br>

                                <label for="datemin" class="mt-4">Date of Product</label>
                                <input type="date" id="datemin" name="date" min="2024-01-01"><br>
                                <div class="form-group d-flex justify-content-between mt-5">
                                    <a href="/items" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Create</button>

                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->

                </div>
            </div>
        </div>
        <!-- delete
        <div class="modal" id="deleteProduct" tabindex="-1">
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
        </div> -->
    </div>

</div>
</div>

<!-- /.container-fluid -->
<?php
require 'layouts/footer.php';
?>