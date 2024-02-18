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
                <option selected>Categories</option>
               <?php foreach ($categories as $key => $category):?>
                    <option value="<?=$category['id']?>"><?=$category['categoryName']?></option>
                <?php endforeach?>
            </select>
            <select class="form-select form-select-sm" name = "asign" aria-label=".form-select-sm example">
                <option selected>Asign Users</option>
                <?php foreach ($categories as $key => $category):?>
                    <option value="<?=$category['id']?>"><?=$category['categoryName']?></option>
                <?php endforeach?>
            </select> <br>

            <label for="datemin" class="mt-4">Date of Product</label>
            <input type="date" id="datemin" name="date" min="2024-01-01"><br>
            <button type="submit" class="btn btn-danger">Create</button>
        </div>
    </form>

</div>

