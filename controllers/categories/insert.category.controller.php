<?php
session_start();
require "../../models/category.model.php";
require "../../database/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape the query string to prevent SQL injection.
    $categoryName = htmlspecialchars($_POST['categoryName']);
    $description = htmlspecialchars($_POST['description']);
    if (!empty($categoryName) and !empty($description)) {
        $isCreate = createCategory($categoryName, $description);
        //it return true or false
        if ($isCreate) {
            header("location: /categories");
            $_SESSION['success-category'] = "Category created successfully";
        } else {
            header("location: /categories");
        }
    }else{
        $_SESSION['error-category'] = ".bg-gradient-warning";
        header("location: /categories");
    }
}