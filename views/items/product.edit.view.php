<?php
require "layouts/header.php";
require "layouts/navbar.php";
?>
<div class="container-fluid col-9">
    <div class="m-4">
        <div class="card text-white bg-primary mb-3">
            <h3 class="card-header bg-primary text-center">Update Product</h3>
            <div class="card-body">
                <form action="controllers/items/item.update.controller.php?id=<?=$product['id']?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$product['id']?>">
                    <div>
                        <div class="row">
                            <div class="col">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" placeholder="User name" name="name" value="<?=$product['name']?>">
                            </div>
                            <div class="col">
                                <label for="">Code of Product</label>
                                <input type="number" class="form-control" placeholder="112233" name="code" value="<?=$product['code']?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Price</label>
                                <input type="number" class="form-control" placeholder="User name" name="price" value="<?=$product['price']?>">
                            </div>
                            <div class="col">
                                <label for="">New Expire of Product</label>
                                <input type="date" class="form-control" name="date" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Quantity</label>
                                <input type="number" class="form-control" placeholder="$" name="qty" value="<?=$product['qty']?>">
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
                                    <select class="form-select form-select-sm  form-control" name="category" aria-label=".form-select-sm example">
                                        <option selected disabled>Categories</option>
                                        <?php foreach ($categories as $key => $category) : ?>
                                            <option value="<?= $category['id'] ?>"><?= $category['categoryName'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label for="">Asign User</label>
                                <div>
                                    <select class="form-select form-select-sm form-control" name="asign" aria-label=".form-select-sm example">
                                        <option selected disabled>Asign Users</option>
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
        </div>

    </div>
</div>
<?php
require "layouts/footer.php";
