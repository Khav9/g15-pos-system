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
                  <h2 class="m-0 font-weight-bold text-primary text-center">Update User</h2>
            </div>
            <div class="card-body">
                  <form action="controllers/users/user.update.controller.php" method="post">
                        <input type="hidden" value="<?=$userUpdate['id']?>" name="id">
                        <div class="form-group">
                              <label for="inputAddress">User Name</label>
                              <input type="text" class="form-control" id="inputAddress" Name="name" value="<?= $userUpdate['userName'] ?>">
                        </div>
                        <div class="form-row">
                              <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" value="<?= $userUpdate['email'] ?>" require>
                              </div>
                              <div class="form-group col-md-6">
                                    <label for="inputCity">Phone / Tell :</label>
                                    <input type="text" class="form-control" id="inputCity" name="phone" value="<?= $userUpdate['phone'] ?>" require>
                              </div>
                        </div>
                        <div class="form-row">
                              <div class="form-group col-md-4">
                                    <label for="inputState">Role</label>
                                    <select id="inputState" class="form-control" name="role">
                                          <option selected disabled>Choose user role</option>
                                          <?php if ($userUpdate['role'] == "Admin") : ?>
                                                <option value="Admin" selected>Admin</option>
                                                <option value="User">User</option>
                                          <?php else : ?>
                                                <option value="Admin">Admin</option>
                                                <option value="User" selected>User</option>
                                          <?php endif; ?>
                                    </select>
                              </div>
                        </div>
                        <div class="form-row d-flex justify-content-between">
                              <a href="/users" class="btn btn-primary">Cancel</a>
                              <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                  </form>
            </div>
      </div>
      <!-- /.container-fluid -->
      </body>

      </html>
</div>
<?php require "layouts/footer.php"; ?>