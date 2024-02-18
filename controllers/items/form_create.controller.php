<?php
require "models/category.model.php";
require "models/userManage.model.php";
//
$categories = getCategories();
$users = getUsers();
require "views/items/form_create.view.php";