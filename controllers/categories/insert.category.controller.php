<?php
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
        } else {
            header("location: /categoryCreate");
        }
    }else{
        header("location: /categoryCreate");
    }
}