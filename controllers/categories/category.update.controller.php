<?php
session_start();
require "../../database/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if (!empty($_POST['name']) && !empty($_POST['description'])) {
            require "../../models/category.model.php";
            $isUpdate = updateCategory($_POST['name'], $_POST['description'], $_POST['id']);
            header('location: /categories');
            $_SESSION['success-category'] = "Update category successfully";
      }else{
        header('Location: /categories');
        $_SESSION['error-category'] = "Can not update category !";
        die();
      };
}
