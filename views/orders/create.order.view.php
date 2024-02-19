<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
require "layouts/header.php";
require "layouts/navbar.php";
?>
<div class="container p-4">
    <div class="card shadow p-4">
        <form action="controllers/orders/create.order.controller.php" method="post">
            <div class="mb-3 d-flex justify-content-end">
                <input type="text" class="border-0" placeholder="Search product" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_name" class="col-sm-2 col-form-label">CustomerName</label>
                <div class="col-sm-10">
                    <input type="text" name="customerName" class="form-control" id="customer_name" placeholder="Name">
                </div>
            </div>
            <div class="d-flex justify-content-evenly mt-3">
                <div class="form-group ">
                    <label for="product">Product</label>
                    <div>
                        <input type="text" name="product" id="product" placeholder="product">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="date">DateOfBuy</label>
                    <div>
                        <input type="date" name="date" id="date" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="quantity">quantity</label>
                    <div>
                        <input type="number" name="quantity" id="quantity" placeholder="quantity">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <label for="price" class="col-sm-1 col-form-label col-form-label-sm">price</label>
                <div>
                    <input type="number" name="price" class="form-control" id="price" placeholder="price">
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <label for="discount" class="col-sm-1 col-form-label col-form-label-sm">Discount</label>
                <div>
                    <input type="number" name="discount" class="form-control" id="discount" placeholder="discount">
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <label for="total" class="col-sm-1 col-form-label col-form-label-sm">Net Amount</label>
                <div>
                    <input type="number" name="total" class="form-control" id="total" placeholder="totle">
                </div>
            </div>
            <div class="d-flex flex-row bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <button class="btn btn-primary">Order</button>
                </div>
                <div class="p-2 bd-highlight">
                    <a href="/orders" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>


</div>