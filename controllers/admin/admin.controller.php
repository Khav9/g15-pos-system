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
$dateToday = date("Y-m-d ");

//product in stock admin and user
$products = getProducts($dateToday);
$productInStock = 0;
$productInStock += sum($products);

$productsUser = getProductsByUser($user[0],$dateToday);
$productInStockUser = 0;
$productInStockUser += sum($productsUser);

$countProducts = count($products);

$countProductsUser = count($productsUser);

//category
$categories = getCategories();
$categoryInStock = count($categories);

///user
$users = getUsers();
$amounUsers = count($users);

//count oders for admin
$ordersAdmin = count(getOrderToday($dateToday));
//user
$ordersUser = count(getOrderTodayUser($dateToday,$user[0]));

require "views/admin/admin.view.php";
