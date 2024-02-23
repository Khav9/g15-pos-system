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
                    <a href="/userCreate" class="btn btn-primary">Create New User</a>
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
                                        <a href="/userUpdate?id=<?= $user['id'] ?>" class="text-info p-2"><i class="fa fa-pen"></i></a>
                                        <a href="controllers/users/user.delete.controller.php?id=<?= $user['id'] ?>" class="text-danger p-2"><i class="fa fa-trash"></i></a>createUser
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->
<?php require "layouts/footer.php"; ?>