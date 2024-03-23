<?php

require '../../database/database.php';
require '../../excelReader/excel_reader2.php';
require '../../excelReader/SpreadsheetReader.php';
$today = $_SESSION['today'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
      if (isset($_FILES['excel']) && $_FILES['excel']['error'] !== UPLOAD_ERR_NO_FILE) {
            $fileName = $_FILES["excel"]["name"];
            $fileExtension = explode('.', $fileName);
            $fileExtension = strtolower(end($fileExtension));
            $newFileName = "products" . date("Y.m.d") . "." . $fileExtension;

            $targetDirectory = "../../assets/files/" . $newFileName;
            move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

            error_reporting(0);
            ini_set('display_errors', 0);

            // require 'excelReader/excel_reader2.php';
            // require 'excelReader/SpreadsheetReader.php';

            require '../../models/product.model.php';
            if ($fileExtension === 'xlsx') {
            $reader = new SpreadsheetReader($targetDirectory);
            $message = '';
            foreach ($reader as $key => $row) {
                  if (count($row) ===8) {
                        $image = '../../assets/products/65ee567c9ad28.png' ;
                        $name = htmlspecialchars($row[0]);
                        $code = htmlspecialchars($row[1]);
                        $price = htmlspecialchars($row[2]);
                        $qty = htmlspecialchars($row[7]);
                        $categoryName = htmlspecialchars($row[3]);
                        $userName = htmlspecialchars($row[4]);
                        $date = htmlspecialchars($row[6]);

                        if(!empty($name) && !empty($qty) && !empty($price) && !empty($date) && !empty($code) && !empty($categoryName) && !empty($userName)){

                          $isCreate = createProduct($name, $code, $price, $qty, $categoryName, $userName,$date,$image,$today);
                        }
                        if ($isCreate) {
                              echo 'Import data is successfully';
                              header('location: /items');
                        } else {
                              echo 'Data having the problem';
                              header('location: /items');
                        }
                  } else {
                        $message = "Data don't match ";
                        header('location: /items');
                  }
            }
      } else {
            header('location: /items');
      }
}}