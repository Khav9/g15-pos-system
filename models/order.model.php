<?php
require_once("../../database/database.php");
function createOrder(string $customerName, string $product, int $price, int $quantity, int $discount, int $total) : bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO orders (customerName,product,price,quantity,discount,total ) values (:customerName, :product, :price,:quantity,:discount,:total)");
    $statement->execute([
        ':customerName' => $customerName,
        ':product' => $product,
        ':price' => $price,
        ':quantity' => $quantity,
        ':discount' => $discount,
        ':total' => $total,

    ]);
    return $statement->rowCount() > 0;
   
}
function getorder() : array
{
    global $connection;
    $statement = $connection->prepare("select * from orders");
    $statement->execute();
    return $statement->fetchAll();
}
function deleteOrder(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("DELETE from orders where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}