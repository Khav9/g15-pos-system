<?php
function getExpireToday(string $today) : array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name, products.price, products.qty, products.image, products.code, category.categoryName, users.userName, products.expire from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.isDelete = 0 and  products.expire < :today");
    $statement->execute([
        ":today" => $today
    ]);
    return $statement->fetchAll();
}
//user
function getExpireTodayUser(string $today,$id) : array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name, products.price, products.qty, products.image, products.code, category.categoryName, users.userName, products.expire from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.isDelete = 0 and  products.expire < :today and products.userID = :id");
    $statement->execute([
        ":today" => $today,
        ":id" => $id,
    ]);
    return $statement->fetchAll();
}

function getExpires(string $today,string $litmit) : array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name, products.price, products.qty, products.image, products.code, category.categoryName, users.userName, products.expire from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.isDelete = 0 and :today < products.expire and products.expire < :limit");
    $statement->execute([
        ":today" => $today,
        ":limit" => $litmit
    ]);
    return $statement->fetchAll();
}

//user

function getExpireTodayByUser(string $today,int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name, products.price, products.qty, products.image, products.code, category.categoryName, users.userName, products.expire from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.isDelete = 0 and  products.expire < :today and users.id = :id");
    $statement->execute([
        ":today" => $today,
        ":id" => $id,
    ]);
    return $statement->fetchAll();
}

function deleteExpired(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE products SET isDelete = :isDelete  where id = :id");
    $statement->execute([
        'isDelete' => 1,
        ':id' => $id
    ]);
    return $statement->rowCount() > 0;
}

function getExpiresUser(string $today,string $limit, int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name, products.price, products.qty, products.image, products.code, category.categoryName, users.userName, products.expire from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.isDelete = 0 and :today < products.expire and products.expire < :limit and users.id = :id");
    $statement->execute([
        ":today" => $today,
        ":limit" => $limit,
        ":id" => $id,
    ]);
    return $statement->fetchAll();
}

function sum(array $products) 
{
$total = 0;
foreach ($products as $key => $product) {
    $total += 1;
}
return $total;
}