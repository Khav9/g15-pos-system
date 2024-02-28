<?php
if (!isset($_SESSION['user'])) {
    header('Location: /');
    die();
}
require "layouts/header.php";
require "layouts/navbar.php";
$user = $_SESSION['user'];
?>
<!-- Begin Page Content -->

<script src="/vendor/search_user/search_user_vendor.js"></script>
<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <form id="searchForm" class="he">
                        <div class="input-group">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="search" id="searchInput" class="form-control" placeholder="Search Product" />
                            </div>
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
                            <div class="input-group">
                            </div>
                        </div>
                    </form>
                    <a href="/userCreate" class="btn btn-primary" data-toggle="modal" data-target="#createUser">Create New User</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $users = getUsers();
                            foreach ($users as $key => $user) {
                            ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $user['userName'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['phone'] ?></td>
                                    <td><img width="30px" height="30px" class="rounded-circle" src="assets/profiles/<?= $user['image'] ?>" alt=""></td>
                                    <td><?= $user['role'] ?></td>
                                    <td class="d-flex justify-content-between">
                                        <a href="/userUpdate?id=<?= $user['id'] ?>" class="text-info p-2" data-toggle="modal" data-target="#editUser<?= $user['id'] ?>"><i class="fa fa-pen"></i></a>
                                        <a href="controllers/users/user.delete.controller.php?id=<?= $user['id'] ?>" class="text-danger p-2" data-toggle="modal" data-target="#deleteUser<?= $user['id'] ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal delete-->
                                <div class="modal fade" id="deleteUser<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger" id="exampleModalLabel">Delete User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete "<span class="text-primary font-weight-bold"><?= $user['userName'] ?></span> " ?</p>
                                            </div>
                                            <form action="controllers/users/user.delete.controller.php" class="modal-footer" method="post">
                                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal edit-->
                                <div class="modal fade" id="editUser<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-primary text-white">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-white" id="exampleModalLabel">Update User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="controllers/users/user.update.controller.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $user[0] ?>">
                                                    <div class="form-group">
                                                        <label for="inputAddress">User Name</label>
                                                        <input type="text" class="form-control" id="inputAddress" Name="name" value="<?= $user[1] ?>">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Email</label>
                                                            <input type="email" class="form-control" id="inputEmail4" name="email" value="<?= $user[2] ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputCity">Phone / Tell :</label>
                                                            <input type="text" class="form-control" id="inputCity" name="phone" value="<?= $user[3] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row d-flex justify-content-between">
                                                        <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- The Modal create-->

        <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-primary text-white">
                    <div class="modal-header">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Create New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/users/insert.user.controller.php" method="post" enctype="multipart/form-data">
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
                                <div class="form-group col-md-6">
                                    <label for="inputZip">Profile Pictcre</label>
                                    <input type="file" class="form-control" id="inputFile" name="image">
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-between">
                                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php require "layouts/footer.php"; ?>