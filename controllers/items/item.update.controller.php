<?php

require "../../database/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if (!empty($_POST['name']) || !empty($_POST['price']) and !empty($_POST['qty']) and !empty($_POST['category']) and !empty($_POST['asign']) and !empty($_POST['date'])) {
            require "../../models/product.model.php";
            $isUpdate = updateProduct($_POST['name'], $_POST['price'], $_POST['qty'], $_POST['category'], $_POST['asign'], $_POST['date'], $_POST['id']);
            if ($isUpdate){
                header('location: /items');
            }
      }else{
        header('Location: /items');
        die();
      };
}

