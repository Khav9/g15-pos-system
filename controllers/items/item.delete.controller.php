<?php

require "../../database/database.php";

$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id))
{
    require '../../models/product.model.php';
    $isDelete = deleteProduct($id);
    if ($isDelete) {
          header('Location: /items');
          exit();
    }
}