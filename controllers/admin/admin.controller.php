<?php

$heading = "Home Page";
require "database/database.php";
require 'models/product.model.php';
require 'models/category.model.php';
require 'models/userManage.model.php';
require 'models/order.model.php';

$user = $_SESSION['user'];
date_default_timezone_get();
date_default_timezone_set('Asia/Phnom_Penh');
$dateToday = date("Y-m-d H:i:s");

$yesterday = strtotime("-1 day", strtotime($_SESSION['today']));


//product in stock admin and user
$products = getProducts($dateToday);
$productInStock = 0;
$productInStock += sum($products);

$productsUser = getProductsByUser($user[0],$dateToday);
$productInStockUser = 0;
$productInStockUser += sum($productsUser);

$countProducts = 0;
foreach ($products as $key => $product) {
    $countProducts+=1;
}

$countProductsUser = 0;
foreach ($productsUser as $key => $value) {
    $countProductsUser+=1;
}


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


//count oders for admin
// $ordersAdmin = sum(getOrders());
$ordersAdmin = count(getOrderToday($yesterday));
//commit test jira
require "views/admin/admin.view.php";
