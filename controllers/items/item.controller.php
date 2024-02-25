<?php
require "models/product.model.php";
require "models/category.model.php";
require "models/userManage.model.php";
$users = getUsers();
$categories = getCategories();

require "views/items/item.view.php";