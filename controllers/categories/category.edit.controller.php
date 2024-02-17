
<?php

require "database/database.php";

$id = $_GET["id"] ? $_GET["id"] : null;

if (isset($id)) {
      require 'models/category.model.php';
      $category = getCategory($id);

      require "views/categories/category.edit.view.php";
}