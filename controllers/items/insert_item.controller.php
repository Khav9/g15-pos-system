<?php
require "../../database/database.php";
require "../../models/product.model.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
     $name = $_POST['name'];
     $price = $_POST['price'];
     $quantity = $_POST['qty'];
     $category = $_POST['category'];
     $asign = $_POST['asign'];
     $date = $_POST['date'];
     if (!empty($name) and !empty($price) and !empty($quantity) and !empty($category) and !empty($asign) and !empty($date)){
         $isCreate = createProduct($name,$price,$quantity,$category,$asign,$date);

         if ($isCreate){
          header ("location: /items");
         }
     }else{
        header('location: /items');
     };

     //it return true or false

}
