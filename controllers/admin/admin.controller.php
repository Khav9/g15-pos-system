<?php

$heading = "Home Page";
require "database/database.php";
require 'models/product.model.php';
require 'models/category.model.php';
require 'models/userManage.model.php';
$user = $_SESSION['user'];
date_default_timezone_get();
date_default_timezone_set('Asia/Phnom_Penh');
$dateToday = date("Y-m-d H:i:s");

//product in stock admin and user
$products = getProducts($dateToday);
$productInStock = 0;
$productInStock += sum($products);

$productsUser = getProductsByUser($user[0]);
$productInStockUser = 0;
$productInStockUser += sum($productsUser);

//category
$categories = getCategories();
$categoryInStock = 0;
foreach ($categories as $key => $category) {
    $categoryInStock += 1;
}

///user
$users = getUsers();
$amounUsers = 0;
foreach ($users as $key => $user) {
    $amounUsers += 1;
}


require "views/admin/admin.view.php";
