<?php
session_start();
require "../../database/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      require "../../models/product.model.php";
      $name = htmlspecialchars($_POST['name']);
      $price = htmlspecialchars($_POST['price']);
      $quantity = htmlspecialchars($_POST['qty']);
      $category = htmlspecialchars($_POST['category']);
      $asign = htmlspecialchars($_POST['asign']);
      $date = htmlspecialchars($_POST['date']);
      $id = htmlspecialchars($_POST['id']);
      $code = htmlspecialchars($_POST['code']);

      $_SESSION['products'] = [
            "success" => "",
            "error" => "",
      ];

      if (!empty($name) and !empty($price) and !empty($quantity) and !empty($category) and !empty($asign) and !empty($date) and !empty($code)) {

            if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {

                  $imgProduct = $_FILES['image'];
                  // Image upload
                  $directory = "../../assets/products/";
                  $target_file = $directory . '.' . basename($_FILES['image']['name']);
                  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                  $checkImageSize = getimagesize($_FILES["image"]["tmp_name"]);
                  if ($checkImageSize) {
                        $imageExtension = explode('.', $target_file)[6];
                        $newFileName = uniqid();
                        $nameInDirectory = $directory . $newFileName . '.' . $imageExtension;
                        $nameInDB = $newFileName . '.' . $imageExtension;
                        move_uploaded_file($_FILES["image"]["tmp_name"], $nameInDirectory);

                        $isUpdate = updateProduct($name, $code, $price, $quantity, $category, $asign, $date, $nameInDB, $id);
                        header('Location: /items');
                        $_SESSION['products']['success'] = 'Product successfully updated';
                  };
            } else {
                  $isUpdate = updateProNotImage($name, $code, $price, $quantity, $category, $asign, $date, $id);
                  header('location: /items');
                  $_SESSION['products']['success'] = 'Product successfully updated';
            }
      } else {
            header('location: /items');
            $_SESSION['products']['error'] = 'Can not update product !';
      }
};
