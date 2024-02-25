<?php

function createProduct(string $name, int $code, int $price, int $quantity, string $category, string $asign, $date, string $image) : bool
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
    $statement = $connection->prepare("select products.id, products.name,products.code, products.price, products.qty,products.expire, products.image, category.categoryName, users.userName from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getProducts() : array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name, products.price, products.qty, products.image, products.code, category.categoryName, users.userName from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.isDelete = 0 order by products.id desc");
    $statement->execute();
    return $statement->fetchAll();
}

function updateProduct(string $name, int $code, int $price, int $quantity, string $category, string $asign, string $date, string $image, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update products set name = :name, code = :code, price = :price, qty = :quantity, categoryID = :category, userID = :asign, image = :image, expire = :date where id = :id");
    $statement->execute([
        ':name' => $name,
        ':code' => $code,
        ':price' => $price,
        ':quantity' => $quantity,
        ':category' => $category,
        ':asign' => $asign,
        ':date' => $date,
        ':image' => $image,
        ':id' => $id
    ]);

    return $statement->rowCount() > 0;
}

// by don't update image
function updateProNotImage(string $name,string $code, int $price, int $quantity, string $category, string $asign, string $date, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update products set name = :name, code = :code, price = :price, qty = :quantity, categoryID = :category, userID = :asign, expire = :date where id = :id");
    $statement->execute([
        ':name' => $name,
        ':code' => $code,
        ':price' => $price,
        ':quantity' => $quantity,
        ':category' => $category,
        ':asign' => $asign,
        ':date' => $date,
        ':id' => $id,
    ]);

    return $statement->rowCount() > 0;
}

function deleteProduct(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE products SET isDelete = :isDelete  where id = :id");
    $statement->execute([
        'isDelete' => 1,
        ':id' => $id
    ]);
    return $statement->rowCount() > 0;
}


//get products by using name login

function getProductsByUser(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name, products.price, products.qty, products.image, products.code, category.categoryName, users.userName from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.isDelete = 0 and users.id = :id order by products.id desc");
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->fetchAll();
}
