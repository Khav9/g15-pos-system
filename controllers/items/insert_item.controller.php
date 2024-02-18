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
     echo $name.$price.$quantity.$category.$asign.$date;

     // $isCreate = createItem($name,$price,$quantity,$category,$asign,$date);
     // //it return true or false

     // if ($isCreate){
     //  header ("location: /items");
     // }else{
     //  header ("location: /create_item");
     // }
}
