<?php
if (isset($_SESSION['user'])) {
    header('Location: /admin');
    die();
}

?>

<body class="card o-hidden border-0 shadow-lg my-4 pb-5 ">
    <div class="card-body p-9 mt-5 ml-4 ">
        <div class="row">
            <img src="assets/images/pos.png" class="col-lg-6 d-none d-lg-block ml-4" alt="..."> 
            <div class="col-lg-5 bg-light">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h2 text-dark">Forgot Your Password?</h1>
                        <p class="mb-4 text-dark">We get it, stuff happens. Just enter your email address below
                            and we'll send you a link to reset your password!
                        </p>
                    </div>
                    <hr>
                    <form class="user" action="controllers/forgot/sentMail.controller.php" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="email"
                                aria-describedby="emailHelp" name="email" placeholder="Enter Email Address...">
                        </div>
                        <button type="submit" class="btn btn-success btn-user btn-block">
                            Sent Email
                        </button>
                        <hr>
                    </form>
                    <div class="text-center">
                        <a class="small text-dark" href="/signup">Create an Account!</a>
                    </div>
                    <div class="text-center">
                        <a class="small text-dark" href="/">Already have an account? Login!</a>
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