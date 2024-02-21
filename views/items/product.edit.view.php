<?php
require "layouts/header.php";
require "layouts/navbar.php";
?>
<div class="m-4">
    <form action="controllers/items/item.update.controller.php" method="post"
        class="container col-6 p-3 mb-2 bg-primary">
        <input type="hidden" name="id" value="<?=$product['id']?>">
        <h1 class="bg-blue m-0 font-weight-bold text-white text-center mb-3">Update Product</h1>
        <div>
            <div class="form-row ml-2">
                <div class="form-group">
                    <label class="text-white">Product Name:</label>
                    <div>
                        <input class="form-control col-md-11 mb-3 " type="text" name="name" placeholder="name"
                            value="<?=$product['name']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-white ml-1">Code of Product:</label>
                    <div>
                        <input class="form-control row-md-4 mb-3 mr-1" type="text" name="code" placeholder="$"
                            value="<?=$product['price']?>">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div>
                        <label class="text-white">Price:</label>
                        <input class="form-control col-md-15 mb-1 " type="text" name="price" placeholder="$">
                    </div>
                    <div>
                        <label class="text-white ml-4">Chose Image:</label>
                        <input class="form-control col-10 ml-4" type="file" name="image" placeholder="image"
                            value="<?=$product['price']?>">
                    </div>
                </div>
      
            </div>
            
            <div class="form-row ml-2">
                <div class="form-group">
                    <label class="text-white mt-4">Quantity:</label>
                    <div>
                        <input class="form-control col-md-19 mb-3" type="text" name="qty" placeholder="quantity"
                            value="<?=$product['qty']?>">
                    </div>
                </div>
                <div>
                    <label for="datemin" class="mt-4 text-white ml-2">Date of Product</label>
                    <input class="form-control col-md-20 mb-18 ml-1 pb-30" type="date" id="datemin" name="date" min="2024-01-01"value=""><br>
                </div>
            </div>
            <select class="form-select form-select-sm ml-2" name="category" aria-label=".form-select-sm example">
                <option selected disabled>Categories</option>
                <?php foreach ($categories as $key => $category):?>
                <option value="<?=$category['id']?>"><?=$category['categoryName']?></option>
                <?php endforeach ?>

            </select>
            <select class="form-select form-select-sm" name="asign" aria-label=".form-select-sm example">
                <option selected disabled>Asign Users</option>
                <?php foreach ($users as $key => $user):?>
                <option value="<?=$user['id']?>"><?=$user['userName']?></option>
                <?php endforeach?>
            </select> <br>
            <div class="form-group d-flex justify-content-between mt-5">
                <a href="/items" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>


        </div>
    </form>

</div>

<?php
require "layouts/footer.php";