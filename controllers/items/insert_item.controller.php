<?php
require "../../database/database.php";
require "../../models/product.model.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = htmlspecialchars($_POST['name']);
      $price = htmlspecialchars($_POST['price']);
      $quantity = htmlspecialchars($_POST['qty']);
      $category = htmlspecialchars($_POST['category']);
      $asign = htmlspecialchars($_POST['asign']);
      $date = htmlspecialchars($_POST['date']);
      $code = htmlspecialchars($_POST['code']);
      $imgProduct = $_FILES['image'];

      if (!empty($name) && !empty($price) && !empty($code) && !empty($quantity) && !empty($category)) {

            if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {

                  // Image upload
                  $directory = "../../assets/products/";
                  $target_file = $directory . '.' . basename($_FILES['image']['name']);
                  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                  $checkImageSize = getimagesize($_FILES["image"]["tmp_name"]);
                  if ($checkImageSize) {
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                              $_SESSION['error'] = "Wrong Image extension!";
                              header('Location: /items');
                        } else {

                              $imageExtension = explode('.', $target_file)[6];
                              $newFileName = uniqid();
                              $nameInDirectory = $directory . $newFileName . '.' . $imageExtension;
                              $nameInDB = $newFileName . '.' . $imageExtension;
                              move_uploaded_file($_FILES["image"]["tmp_name"], $nameInDirectory);

                              $isCreate = createProduct($name, $code, $price, $quantity, $category, $asign, $date, $nameInDB);
                              $_SESSION['success'] = "Account successfully created";
                              header('Location: /items');
                        }
                  } else {
                        $_SESSION['error'] = "Not Image file!";
                        header('Location: /items');
                  }
            }else{
                  $imageProduct = 'image.jpg';
                  $isCreate = createProduct($name, $code, $price, $quantity, $category, $asign, $date, $imageProduct);
                  header('location: /items');
            }
      } else {
            //can add alert
            header('location: /items');
      }
}
