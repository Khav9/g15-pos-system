<?php
if (!isset($_SESSION['user'])) {
    header('Location: /');
    die();
}
require "layouts/header.php";
require "layouts/navbar.php";

?>
<div class="container col-6">
      
        <div class="card container-fluid my-5">
            <div class="card-header py-3">
                <h2 class="m-0 font-weight-bold text-primary text-center">Update Category</h2>
            </div>
            <div class="card-body">
                <form action="controllers/categories/category.update.controller.php" method="post">
                    <input type="hidden" value="<?= $category['id'] ?>" name="id">
                    <div class="form-group">
                        <label for="inputAddress">Category Name</label>
                        <input type="text" class="form-control" id="inputAddress" name="name"
                            value="<?= $category['categoryName'] ?>">
                    </div>
                    <div class="form-row">
    
                        <label for="inputEmail4">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                        name="description"><?= $category['description'] ?></textarea>
    
                    </div>
                    <div class="form-row d-flex justify-content-between mt-3">
                        <a href="/categories" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
    </div>
    <!-- /.container-fluid -->
    </body>

    </html>
</div>
