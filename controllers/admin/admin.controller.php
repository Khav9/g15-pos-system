<?php

$heading = "Home Page";
require "database/database.php";
require 'models/product.model.php';
require 'models/category.model.php';
require 'models/userManage.model.php';
//product in stock
$products = getProducts();
$productInStock = 0;
foreach ($products as $key => $product) {
    $stock = $product['qty'];
    if ($stock > 0) {
        $productInStock += $stock;
    }
}
//category
$categories = getCategories();
$categoryInStock = 0;
foreach ($categories as $key => $category) {
    $stockCategories = 1;
    if ($stockCategories > 0) {
        $categoryInStock += $stockCategories;
    }
}
///user
$users = getUsers();
$amounUsers = 0;
foreach ($users as $key => $user) {
    $stockUsers = 1;
    if ($stockUsers > 0) {
        $amounUsers += $stockUsers;
    }
}
require "views/admin/admin.view.php";
