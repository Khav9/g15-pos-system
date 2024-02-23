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
      
      <div class="container-fluid my-5 text-white bg-primary col-8">
            <div class="card-header py-3 bg-primary ">
                  <h2 class="m-0 font-weight-bold text-white text-center">Update User</h2>
            </div>
            <div class="card-body">
                  <form action="controllers/users/user.update.controller.php" method="post">
                        <input type="hidden" name="id" value="<?=$userUpdate[0]?>">
                        <div class="form-group">
                              <label for="inputAddress">User Name</label>
                              <input type="text" class="form-control" id="inputAddress" Name="name" value="<?=$userUpdate[1]?>">
                        </div>
                        <div class="form-row">
                              <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" value="<?=$userUpdate[2]?>">
                              </div>
                              <div class="form-group col-md-6">
                                    <label for="inputCity">Phone / Tell :</label>
                                    <input type="text" class="form-control" id="inputCity" name="phone" value="<?=$userUpdate[3]?>">
                              </div>
                        </div>
                        <div class="form-row d-flex justify-content-between">
                              <a href="/users" class="btn btn-danger">Cancel</a>
                              <button type="submit" class="btn btn-success">Create</button>
                        </div>
                  </form>
            </div>
      </div>
      <!-- /.container-fluid -->
      </body>

      </html>
</div>
<?php require "layouts/footer.php"; ?>