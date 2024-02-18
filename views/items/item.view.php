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
        <div class="card-header py-3">
            <a href="/productCreate" class="btn btn-primary">Create Product</a>
        </div>
        <div class="d-flex justify-content-between">
            <form id="searchForm" class="d-flex ml-4">
                <div class="input-group">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="search" id="searchInput" class="form-control mt-4" placeholder="Search Product" />
                    </div>
                    <button type="button" class="btn btn-primary mt-4" data-mdb-ripple-init>
                        <i class="fas fa-search"></i>
                    </button>
            <div class="input-group">
    
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
                                    <a href="/editItem?id=<?= $item['id'] ?>" class="text-info p-2"><i class="fa fa-pen"></i></a>
                                    <a href="controllers/items/item.delete.controller.php?id=<?= $item['id'] ?>" class="text-danger p-2"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>

</div>
</div>

<!-- /.container-fluid -->
<?php 
require 'layouts/footer.php';
?>