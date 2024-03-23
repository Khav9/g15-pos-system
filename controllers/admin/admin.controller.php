<?php

$heading = "Home Page";

require "database/database.php";
require 'models/product.model.php';
require 'models/category.model.php';
require 'models/userManage.model.php';
require 'models/order.model.php';
require 'models/expired.model.php';

$user = $_SESSION['user'];
$today = $_SESSION['today'];



//product in stock admin and user
$products = getProducts($today);
$productInStock = 0;
$productInStock += sumNumber($products);

$productsUser = getProductsByUser($user[0],$today);
$productInStockUser = 0;
$productInStockUser += sumNumber($productsUser);

$countProducts = count($products);

$countProductsUser = count($productsUser);

//category
$categories = getCategories();
$categoryInStock = count($categories);

///user
$users = getUsers();
$amounUsers = count($users);

//count oders for admin
$ordersAdmin = count(getOrderToday($today));
//user
$ordersUser = count(getOrderTodayUser($today,$user[0]));

//earning admin
$earningAmin = 0;
$orderToday = getOrderToday($today);
foreach ($orderToday as $key => $value) {
      $earningAmin += $value[2];
}

//earning user
$earningUser = 0;
$orderTodayUser = getOrderTodayUser($today,$user[0]);
foreach ($orderTodayUser as $key => $valu) {
      $earningUser += $valu[2];
}

//

$allProduct = count($products);
$productExpires = count(getExpireToday($today));
$newProducts = count(geNewtProducts($user[0],$today));
$PercentNewProducts=0;
$PercentExpireProduct=0;
if($allProduct >0){
      $PercentNewProducts = number_format(($newProducts * 100)/$allProduct);
      $PercentExpireProduct = number_format(($productExpires * 100)/$allProduct);

}


require "views/admin/admin.view.php";
