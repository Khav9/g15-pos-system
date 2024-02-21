<?php
if (!isset($_SESSION['user'])) {
      header('Location: /');
      die();
}
require "layouts/header.php";
require "layouts/navbar.php";
$user = $_SESSION['user'];
?>
<div class="container-fluid">
      <div class="container-fluid my-5">
            <div class="card-header py-3">
                  <h2 class="m-0 font-weight-bold text-primary text-center">Create New User</h2>
            </div>
            <div class="card-body">
                  <form action="controllers/users/insert.user.controller.php" method="post"  enctype="multipart/form-data">
                        <div class="form-group">
                              <label for="inputAddress">User Name</label>
                              <input type="text" class="form-control" id="inputAddress" Name="name">
                        </div>
                        <div class="form-row">
                              <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email">
                              </div>
                              <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" id="inputPassword4" name="password">
                              </div>
                        </div>
                        <div class="form-row">
                              <div class="form-group col-md-6">
                                    <label for="inputCity">Phone / Tell :</label>
                                    <input type="text" class="form-control" id="inputCity" name="phone">
                              </div>
                              <div class="form-group col-md-2">
                                    <label for="inputZip">Profile Pictcre</label>
                                    <input type="file" class="form-control" id="inputFile" name="image">
                              </div>
                        </div>
                        <div class="form-row d-flex justify-content-between">
                              <a href="/users" class="btn btn-primary">Cancel</a>
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