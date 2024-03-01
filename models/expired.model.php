<?php

// function getExpire(int $id) : array

function getExpireToday(string $today) : array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name, products.price, products.qty, products.image, products.code, category.categoryName, users.userName, products.expire from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.isDelete = 0 and  products.expire < :today");
    $statement->execute([
        ":today" => $today
    ]);
    return $statement->fetchAll();
}