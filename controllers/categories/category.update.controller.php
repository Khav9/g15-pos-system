<?php
session_start();
require "../../database/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = htmlspecialchars($_POST['name']);
      $description = htmlspecialchars($_POST['description']);

      if (!empty($_POST['name']) && !empty($_POST['description'])) {
            require "../../models/category.model.php";
            $isUpdate = updateCategory($name, $description, $_POST['id']);
            header('location: /categories');
            $_SESSION['success-category'] = "Update category successfully";
      }else{
        header('Location: /categories');
        $_SESSION['error-category'] = "Can not update category !";
        die();
      };
}
