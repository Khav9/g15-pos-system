<?php
if (isset($_SESSION['user'])) {
    header('Location: /admin');
    die();
}

require "layouts/header.php";
?>

<body class="bg-gradient-primary text-center">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block "><img src="../../assets/images/pos-system-features.webp" alt="" style="width: 475px;height: 520px;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                    <h1 class="h2 mb-4 text-dark">Welcome to POS</h1>
                                    </div>
                                    <form class="user" action="controllers/login/checkLogin.controller.php" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control <?php if (isset($_SESSION['borderEmail'])) {
                                                                                                        echo $_SESSION['borderEmail'];
                                                                                                    } elseif (isset($_SESSION['isNotFill'])) {
                                                                                                        echo 'is-invalid';
                                                                                                    };
                                                                                                    unset($_SESSION['borderEmail']); ?>" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            <small class="ml-3 text-danger">
                                                <?php
                                                if (isset($_SESSION['notFound'])) {
                                                    echo $_SESSION['notFound'];
                                                } elseif (isset($_SESSION['isNotFill'])) {
                                                    echo $_SESSION['isNotFill'] . ' email';
                                                }
                                                unset($_SESSION['notFound']);
                                                ?>
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control 
                                            <?php
                                            if (isset($_SESSION['borderPassword'])) {
                                                echo $_SESSION['borderPassword'];
                                            } elseif (isset($_SESSION['isNotFill'])) {
                                                echo 'is-invalid';
                                            }
                                            unset($_SESSION['borderPassword']);
                                            ?>" id="exampleInputPassword" placeholder="Password" name="password">
                                            <small class="ml-3 text-danger">
                                                <?php
                                                if (isset($_SESSION['error'])) {
                                                    echo $_SESSION['error'];
                                                } elseif (isset($_SESSION['isNotFill'])) {
                                                    echo $_SESSION['isNotFill'] . ' password';
                                                }
                                                unset($_SESSION['isNotFill']);
                                                unset($_SESSION['error']);
                                                ?>
                                            </small>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block btn-danger">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center ">
                                        <a class="small text-primary" href="/signup"  >Create an Account!</a><br>
                                        <a href="/forgotPassword" class="small text-dark">Forgot Password</a>
                                    </div>
                                </div>
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