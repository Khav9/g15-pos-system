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
<link rel="stylesheet" href="/vendor/alerts.categoty/alerts.category.css">
<script src="/vendor/alerts.categoty/alerts.category.js" defer></script>
<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- notification -->
        <div class="notification">
            <?php if (!empty($_SESSION['errors']['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show toast d-flex align-items-center" id="alertCategory" role="alert">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <div class="d-felx justify-content-center">
                        <!-- <h6>News</h6> -->
                        <p><?= $_SESSION['errors']['success'] ?></p>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                unset($_SESSION['errors']['success']);
            endif;
            ?>
            <?php if (!empty($_SESSION['errors']['error'])) : ?>
                <link rel="stylesheet" href="/vendor/alerts.categoty/alerts.category.error.css">

                <div class="alert alert-warning alert-dismissible fade show toast d-flex align-items-center" id="alertCategory" role="alert">
                    <i class="fa fa-exclamation-triangle" id="catWarning" aria-hidden="true"></i>
                    <div class="d-felx justify-content-center">
                        <!-- <h6>News</h6> -->
                        <p class="text"><?= $_SESSION['errors']['error'] ?></p>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                unset($_SESSION['errors']['error']);
            endif;
            ?>
        </div>
        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <a href="/userCreate" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createUser"><i class="fa fa-plus-square mr-3"></i>Create New User</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mt-2 mb-2" id="dataTable" width="100%" cellspacing="0">
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
                                        <a href="/user?id=<?= $user['id'] ?>" class="text-info p-2" data-toggle="modal" data-target="#detailInfo<?= $user['id'] ?>"><i class="fa fa-eye"></i></a>
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
                                                <div class="modal-footer">
                                                    <form action="controllers/users/user.delete.controller.php" class="" method="post">
                                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal edit-->
                                <div class="modal fade" id="editUser<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="controllers/users/user.update.controller.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $user[0] ?>">
                                                    <div class="text-center">
                                                        <img width="150px" height="150px" class="rounded-circle border border-success p-3 " src="assets/profiles/<?= $user['image'] ?>" alt="" id="img">
                                                    </div>
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
                                                        <a href="" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</a>
                                                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal detail-->
                                <div class="modal fade" id="detailInfo<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">User Information Summary</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <img width="150px" height="150px" class="rounded-circle border border-success p-3 " src="assets/profiles/<?= $user['image'] ?>" alt="" id="img">
                                                </div>
                                                <br>
                                                <div class="pl-4">
                                                    <div class="pl-4 col-md-12">
                                                        <div class="row">
                                                            <label for="inputAddress" class="font-weight-bold">User Name :</label>
                                                            <p class="ml-4 font-weight-bold badge badge-info"><?= $user['userName'] ?></p>
                                                        </div>
                                                        <div class="row">
                                                            <label for="inputAddress" class="font-weight-bold">User Role :</label>
                                                            <p class="pl-4 "><?= $user['role'] ?></p>

                                                        </div>
                                                        <div class="row">
                                                            <label for="inputAddress" class="font-weight-bold">User's email:</label>
                                                            <p class="pl-4 "><?= $user['email'] ?></p>

                                                        </div>
                                                        <div class="row">
                                                            <label for="inputAddress" class="font-weight-bold">Number Phone :</label>
                                                            <p class="pl-4 "><?= $user['phone'] ?></p>

                                                        </div>
                                                        <div class="row">
                                                            <label for="inputAddress" class="font-weight-bold">Create At :</label>
                                                            <p class="ml-4 "><?= date('j-F-Y', strtotime($user['createAt'])); ?></p>
                                                            <p class="ml-4"><?= date('g:i A', strtotime($user['createAt'])); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
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
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel">Create New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/users/insert.user.controller.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control
                                <?php
                                if (isset($_SESSION['errors']['username'])) {
                                    echo $_SESSION['errors']['borderName'];
                                }
                                ?>
                                " id="inputAddress" Name="name">
                                <small class="text-danger">
                                    <?php
                                    if (isset($_SESSION['errors']['username'])) {
                                        echo $_SESSION['errors']['username'];
                                    }
                                    ?>
                                </small>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control
                                    <?php
                                    if (isset($_SESSION['errors']['email'])) {
                                        echo $_SESSION['errors']['borderEmail'];
                                    }
                                    ?>
                                    " id="inputEmail4" name="email">
                                    <small class="text-danger">
                                        <?php
                                        if (isset($_SESSION['errors']['email'])) {
                                            echo $_SESSION['errors']['email'];
                                        }
                                        ?>
                                    </small>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="password" class="form-control
                                    <?php
                                    if (isset($_SESSION['errors']['password'])) {
                                        echo $_SESSION['errors']['borderPassword'];
                                    }
                                    ?>
                                    " id="inputPassword4" name="password">
                                    <small class="text-danger">
                                        <?php
                                        if (isset($_SESSION['errors']['password'])) {
                                            echo $_SESSION['errors']['password'];
                                        }
                                        ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control
                                    <?php
                                    if (isset($_SESSION['errors']['phone'])) {
                                        echo $_SESSION['errors']['borderPhone'];
                                    }
                                    ?>
                                    " id="inputCity" name="phone">
                                    <small class="text-danger">
                                        <?php
                                        if (isset($_SESSION['errors']['phone'])) {
                                            echo $_SESSION['errors']['borderPhone'];
                                        }
                                        ?>
                                    </small>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="file" class="form-control" id="inputFile" name="image">
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-between">
                                <a href="" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-success btn-sm">Create</button>
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