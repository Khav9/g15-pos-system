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
            <?php if ($user[5] === 'admin') : ?>
            <div class="mr-4 mt-4">
                <a href="/productCreate" class="btn btn-primary" data-toggle="modal" data-target="#createProduct"><i
                        class="fa fa-plus-square mr-3"></i>Create Product</a>
            </div>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Bar code</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <?php if ($user[5] === 'admin') {
                                echo '
                                <th>Asign User</th>
                                <th>Action</th>
                                ';
                            }; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $products = null;
                        if ($user[5] === 'admin') {
                            $products = getProducts(); // set it here it's okay. if set it on product.controller.php it's okay
                        } else {
                            $products = getProductsByUser($user[0]);
                        }

                        foreach ($products as $key => $product) {
                        ?>
                        <tr>
                            <td><img width="39px" height="39px" class="rounded-circle"
                                    src="assets/products/<?= $product['image'] ?>" alt=""></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['code'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td><?= $product['qty'] ?></td>
                            <td><?= $product['categoryName'] ?></td>
                            <?php if ($user[5] === 'admin') : ?>
                            <td><?= $product['userName'] ?></td>
                            <td class="d-5">
                                <a href="/productUpdate?id=<?= $product['id'] ?>" class="text-info p-2"
                                    data-toggle="modal" data-target="#updateProduct<?= $product['id'] ?>"><i
                                        class="fa fa-pen"></i></a>
                                <a href="/controllers/items/item.delete.controller.php?id=<?= $product['id'] ?>"
                                    class="text-danger p-2" data-toggle="modal" data-target="#deleteProduct<?= $product['id'] ?>"><i class="fa fa-trash"></i></a>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <!-- =====Update Product Model==== -->
                        <div class="modal ml-5" id="updateProduct<?=$product['id']?>">
                            <div class="modal-dialog">
                                <div class="modal-content bg-primary text-white">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="bg-blue m-0 font-weight-bold text-center mb-3">
                                            Update Product</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="controllers/items/item.update.controller.php" method="post">
                                            <input type="hidden" name="id" value="<?=$product['id']?>">
                                            <div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="">Product Name</label>
                                                        <input type="text" class="form-control" placeholder="User name"
                                                            name="name" value="<?=$product['name']?>">
                                                    </div>
                                                    <div class="col">
                                                        <label for="">Code of Product</label>
                                                        <input type="number" class="form-control" placeholder="112233"
                                                            name="code" value="<?=$product['code']?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="">Price</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="User name" name="price"
                                                            value="<?=$product['price']?>">
                                                    </div>
                                                    <div class="col">
                                                        <label for="">New Expire of Product</label>
                                                        <input type="date" class="form-control" name="date">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="">Quantity</label>
                                                        <input type="number" class="form-control" placeholder="$"
                                                            name="qty" value="<?=$product['qty']?>">
                                                    </div>
                                                    <div class="col">
                                                        <label for="">Image of Product</label>
                                                        <input type="file" class="form-control" placeholder="Last name"
                                                            name="image">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <label for="">Category</label>
                                                        <div>
                                                            <select class="form-select form-select-sm  form-control"
                                                                name="category" aria-label=".form-select-sm example">
                                                                <option selected disabled>Categories</option>
                                                                <?php foreach ($categories as $key => $category) : ?>
                                                                <option value="<?= $category['id'] ?>">
                                                                    <?= $category['categoryName'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <label for="">Category</label>
                                                        <div>
                                                            <select class="form-select form-select-sm  form-control"
                                                                name="asign" aria-label=".form-select-sm example">
                                                                <option selected disabled>Categories</option>
                                                                <?php foreach ($users as $key => $use) : ?>
                                                                <option value="<?= $use['id'] ?>">
                                                                    <?= $use['userName'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                </div>
                                                <div class="form-group d-flex justify-content-between mt-5">
                                                    <a href="/items" class="btn btn-danger">Cancel</a>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Modal footer -->

                                </div>
                            </div>
                        </div>

                           <!-- Modal delete-->
                           <div class="modal fade" id="deleteProduct<?= $product['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Product</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete  "<span class="text-primary"><?=$product['name']?></span> " ?</p>
                                            </div>
                                            <form action="controllers/items/item.delete.controller.php" class="modal-footer" method="post">
                                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                        <?php
                        }
                        ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>


    <!-- The Modal create-->
    <div class="modal ml-5" id="createProduct">
        <div class="modal-dialog">
            <div class="modal-content bg-primary text-white">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="bg-blue m-0 font-weight-bold  text-center mb-3">Create New Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="controllers/items/insert_item.controller.php" method="post"
                        enctype="multipart/form-data">
                        <div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control" placeholder="Product Name" name="name">
                                </div>
                                <div class="col">
                                    <label for="">Code of Product</label>
                                    <input type="number" class="form-control" placeholder="112233" name="code">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Price</label>
                                    <input type="number" class="form-control" placeholder="$" name="price">
                                </div>
                                <div class="col">
                                    <label for="">Expire of Product</label>
                                    <input type="date" class="form-control" name="date">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Quantity</label>
                                    <input type="number" class="form-control" placeholder="qty" name="qty">
                                </div>
                                <div class="col">
                                    <label for="">Image of Product</label>
                                    <input type="file" class="form-control" placeholder="Last name" name="image">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Category</label>
                                    <div>
                                        <select class="form-select form-select-sm  form-control" name="category"
                                            aria-label=".form-select-sm example">
                                            <option selected disabled>Categories</option>
                                            <?php foreach ($categories as $key => $category) : ?>
                                            <option value="<?= $category['id'] ?>"><?= $category['categoryName'] ?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Asign User</label>
                                    <div>
                                        <select class="form-select form-select-sm form-control" name="asign"
                                            aria-label=".form-select-sm example">
                                            <option selected disabled>Asign Users</option>
                                            <option value="0">Available</option>
                                            <?php foreach ($users as $key => $user) : ?>
                                            <option value="<?= $user['id'] ?>"><?= $user['userName'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-between mt-5">
                                <a href="/items" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-success">Create</button>

                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->

            </div>
        </div>
    </div>

</div>


</div>


<?php
require 'layouts/footer.php';
?>