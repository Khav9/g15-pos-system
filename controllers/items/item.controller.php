<?php
require "models/product.model.php";
require "models/category.model.php";
$categories = getCategories();
require "views/items/item.view.php";