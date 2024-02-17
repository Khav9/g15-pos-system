<?php
if (!isset($_SESSION['user'])) {
    header('Location: /login');
    die();
}
require "layouts/header.php";
require "layouts/navbar.php";
$user = $_SESSION['user'];
?>
<div class="container-fluid">
    <div class="container-fluid my-5">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary text-center">Create Category</h2>
        </div>
        <div class="card-body">
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
                    <a href="/categories" class="btn btn-primary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
    </body>

    </html>
</div>
<?php require "layouts/footer.php"; ?>