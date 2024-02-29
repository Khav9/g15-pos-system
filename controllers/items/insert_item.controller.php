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

      date_default_timezone_get();
      date_default_timezone_set('Asia/Phnom_Penh');
      $registration_date = date("Y-m-d H:i:s");


      if (!empty($name) && !empty($price) && !empty($code) && !empty($quantity) && !empty($category) && !empty($date)) {
            if ($date > $registration_date) {

                  if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {

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

                              $isCreate = createProduct($name, $code, $price, $quantity, $category, $asign, $date, $nameInDB);
                              $_SESSION['success'] = "Account successfully created";
                              header('Location: /items');
                        } else {
                              $_SESSION['error'] = "Not Image file!";
                              header('Location: /items');
                        }
                  } else {
                        $imageProduct = '../../assets/products/65e01a704e423.png';
                        $isCreate = createProduct($name, $code, $price, $quantity, $category, $asign, $date, $imageProduct);
                        header('location: /items');
                  }
            } else {
                  //can add alert date out of range
                  header('location: /items');
            }
      }else{
            header('location: /items');
      }
}
