<?php
require "models/category.model.php";
//
$categories = getCategories();
require "views/items/form_create.view.php";