<?php
require "layouts/header.php";
require "layouts/navbar.php";
?>
<div class="m-4 ">
    <form action = "controllers/items/insert_item.controller.php" method = "post">
        <h1 class="bg-blue">Create Product</h1>
        <div>
            <div class="form-group">
                <label>Product Name:</label>
                <div>
                    <input class="form-control " type="text" name = "name" placeholder="name">
                </div>
            </div>
            <div class="form-group">
                <label>Price:</label>
                <div>
                    <input class="form-control" type="text" name = "price" placeholder="$">
                </div>
            </div>
            <div class="form-group">
                <label>Quantity:</label>
                <div>
                    <input class="form-control" type="text" name = "qty" placeholder="quantity">
                </div>
            </div>
            <select class="form-select form-select-sm" name = "category" aria-label=".form-select-sm example">
                <option selected disabled>Categories</option>
               <?php foreach ($categories as $key => $category):?>
                    <option value="<?=$category['id']?>"><?=$category['categoryName']?></option>
                <?php endforeach?>
            </select>
            <select class="form-select form-select-sm" name = "asign" aria-label=".form-select-sm example">
                <option selected disabled>Asign Users</option>
                <?php foreach ($users as $key => $user):?>
                    <option value="<?=$user['id']?>"><?=$user['userName']?></option>
                <?php endforeach?>
            </select> <br>

            <label for="datemin" class="mt-4">Date of Product</label>
            <input type="date" id="datemin" name="date" min="2024-01-01"><br>
            <div class="form-group d-flex justify-content-between mt-5">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="/items" class="btn btn-danger">Cancel</a>

            </div>
        </div>
    </form>

</div>

<?php
require "layouts/footer.php";