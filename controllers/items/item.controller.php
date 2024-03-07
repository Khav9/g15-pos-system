<?php
require "models/product.model.php";
require "models/category.model.php";
require "models/userManage.model.php";
$users = getUsers();
$categories = getCategories();

date_default_timezone_get();
date_default_timezone_set('Asia/Phnom_Penh');
$dateToday = date("Y-m-d H:i:s");

require "views/items/item.view.php";