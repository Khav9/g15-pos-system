<?php

require '../../database/database.php';
require '../../excelReader/excel_reader2.php';
require '../../excelReader/SpreadsheetReader.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
      if (isset($_FILES['excel']) && $_FILES['excel']['error'] !== UPLOAD_ERR_NO_FILE) {
            $fileName = $_FILES["excel"]["name"];
            $fileExtension = explode('.', $fileName);
            $fileExtension = strtolower(end($fileExtension));
            $newFileName = "category" . date("Y.m.d") . "." . $fileExtension;

            $targetDirectory = "../../assets/files/" . $newFileName;
            move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

            error_reporting(0);
            ini_set('display_errors', 0);

            // require 'excelReader/excel_reader2.php';
            // require 'excelReader/SpreadsheetReader.php';

            //me
            require '../../models/category.model.php';
            // if ($fileExtension === 'xlsx') {
            $reader = new SpreadsheetReader($targetDirectory);
            $message = '';
            foreach ($reader as $key => $row) {
                  if (count($row) === 2) {
                        $name = htmlspecialchars($row[0]);
                        $description = htmlspecialchars($row[1]);
                        if (!empty($name)){
                              $isCreate = createCategory($name, $description);
                        }
                        if ($isCreate) {
                              $message = 'Import data successfully';
                        } else {
                              $message = 'Data have problem';
                        }
                  } else {
                        $message = "Data don't match ";
                  }
            }
      } else {
            header('location: /categories');
      }
      header('location: /categories');
}
