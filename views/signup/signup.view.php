<?php
if (isset($_SESSION['user'])) {
    header('Location: /admin');
    die();
}
require "layouts/header.php";

?>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <!-- form here -->
                            <form action="controllers/signup/createUser.controller.php" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <!-- <label for="inputAddress">User Name</label> -->
                                            <input type="text" class="form-control
                                            <?php if (isset($_SESSION['errors'])) {
                                                echo $_SESSION['errors']['borderName'];
                                            }
                                            ?>
                                            " id="inputAddress" Name="name" placeholder="Username">
                                            <small class="text-danger">
                                                <?php if (isset($_SESSION['errors']['username'])) {
                                                    echo $_SESSION['errors']['username'];
                                                } ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <!-- <label for="inputCity">Phone / Tell :</label> -->
                                            <input type="text" class="form-control
                                             <?php if (isset($_SESSION['errors'])) {
                                                    echo $_SESSION['errors']['borderPhone'];
                                                }; ?>
                                                " id="inputCity" name="phone" placeholder="Phone number">
                                            <small class="text-danger">
                                                <?php if (isset($_SESSION['errors']['phone'])) {
                                                    echo $_SESSION['errors']['phone'];
                                                } ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <!-- <label for="inputEmail4">Email</label> -->
                                        <input type="email" class="form-control
                                        <?php if (isset($_SESSION['errors'])) {
                                            echo $_SESSION['errors']['borderEmail'];
                                        }; ?>
                                        " id="inputEmail4" name="email" placeholder="Email">
                                        <small class="text-danger">
                                            <?php if (isset($_SESSION['errors']['email'])) {
                                                echo $_SESSION['errors']['email'];
                                            } ?>
                                        </small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- <label for="inputPassword4">Password</label> -->
                                        <input type="password" class="form-control 
                                        <?php if (isset($_SESSION['errors'])) {
                                            echo $_SESSION['errors']['borderPassword'];
                                        }; ?>
                                        " id="inputPassword4" name="password" placeholder="Password">
                                        <small class="text-danger">
                                            <?php if (isset($_SESSION['errors']['password'])) {
                                                echo $_SESSION['errors']['password'];
                                            } ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-row d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Create</button>
                                    <button class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Register with Google
                                    </button>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a href="/forgotPassword" class="small">Forget Password</a><br>
                                <a class="small" href="/">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>