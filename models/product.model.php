<?php

function createProduct(string $name, string $code, int $price, int $quantity, string $category, string $asign, $date, string $image) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into  products(name, code, price, qty, categoryID, userID, expire, isDelete, image) values (:name, :code, :price, :qty, :categoryID, :userID, :expire , :isDelete, :image)");
    $statement->execute([
        ':name' => $name,
        ':code' => $code,
        ':price' => $price,
        ':qty' => $quantity,
        ':categoryID' => $category,
        ':userID' => $asign,
        ':expire' => $date,
        ':isDelete' => 0,
        ':image' => $image,

    ]);

    return $statement->rowCount() > 0;
}

function getProduct(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name, products.price, products.qty,products.expire, category.categoryName, users.userName from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getProducts() : array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name, products.price, products.qty, products.image, products.code, category.categoryName, users.userName from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id order by products.id desc");
    $statement->execute();
    return $statement->fetchAll();
}

function updateProduct(string $name, int $price, int $quantity, string $category, string $asign, string $date, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update products set name = :name, price = :price, qty = :quantity, categoryID = :category, userID = :asign, expire = :date where id = :id");
    $statement->execute([
        ':name' => $name,
        ':price' => $price,
        ':quantity' => $quantity,
        ':category' => $category,
        ':asign' => $asign,
        ':date' => $date,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}

function deleteProduct(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from products where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}