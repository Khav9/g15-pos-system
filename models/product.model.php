<?php

function createProduct(string $name, int $price, int $quantity, string $category, string $asign, $date) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into  products(name, price, qty, categoryID, userID, expire, isDelete) values (:name, :price, :qty, :categoryID, :userID, :expire , :isDelete)");
    $statement->execute([
        ':name' => $name,
        ':price' => $price,
        ':qty' => $quantity,
        ':categoryID' => $category,
        ':userID' => $asign,
        ':expire' => $date,
        ':isDelete' => 0,

    ]);

    return $statement->rowCount() > 0;
}

function getProduct(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getProducts() : array
{
    global $connection;
    $statement = $connection->prepare("select products.name, products.price, products.qty, category.categoryName, users.userName from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id");
    $statement->execute();
    return $statement->fetchAll();
}

function updateProduct(string $name, int $price, int $quantity, string $category, string $asign, string $date, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update posts set name = :name, price = :price, quantity = :quantity, category = :category, asign = :asign, date = :date, action = :action where id = :id");
    $statement->execute([
        ':name' => $name,
        ':price' => $price,
        ':quantity' => $quantity,
        ':category' => $category,
        ':asign' => $asign,
        ':date' => $date,
        ':action' => $action,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}

function deleteProduct(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}