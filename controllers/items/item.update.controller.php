<?php

require "../../database/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      require "../../models/product.model.php";
      $name = $_POST['name'];
      $price =  $_POST['price'];
      $quantity =  $_POST['qty'];
      $category = $_POST['category'];
      $asign = $_POST['asign'];
      $date = $_POST['date'];
      $id = $_POST['id'];
      $code = $_POST['code'];

      if (!empty($name) and !empty($price) and !empty($quantity) and !empty($category) and !empty($asign) and !empty($date) and !empty($code)) {

            if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {

                  $imgProduct = $_FILES['image'];
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

                              $isUpdate = updateProduct($name, $code, $price, $quantity, $category, $asign, $date, $nameInDB, $id);

                              header('Location: /items');
                        };
                  };
            } else {
                  $isUpdate = updateProNotImage($name, $code, $price, $quantity, $category, $asign, $date, $id);
                  header('location: /items');
            }
      }else{
            header('location: /items');
      }
};
