<?php

require "database/database.php";

$id = $_GET["id"] ? $_GET["id"] : null;

if (isset($id)) {
      require 'models/product.model.php';
      require 'models/category.model.php';
      require 'models/userManage.model.php';
      $product = getProduct($id);

      $categories = getCategories();
      $users = getUsers();

      require "views/items/product.edit.view.php";
}

