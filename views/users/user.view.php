<?php
if (!isset($_SESSION['user'])) {
    header('Location: /login');
    die();
}
require "layouts/header.php";
require "layouts/navbar.php";
?>
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

</div>
<!-- /.container-fluid -->
<?php require "layouts/footer.php"; ?>