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
      
      if (!empty($_POST['name']) and !empty($_POST['price']) and !empty($_POST['qty']) and !empty($_POST['category']) and !empty($_POST['asign'])) {
            
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

                        $isUpdate = updateProduct($name, $price, $quantity, $category, $asign, $date, $nameInDB, $id);

                        header('Location: /items');
                  };
            };
      }else{
            header('location: /items');
      }
};
