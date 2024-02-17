<?php

function createCategory(string $categoryName, string $description) : bool
{
    global $connection;
    $defaultRole = 'user';
    $statement = $connection->prepare("insert into category (categoryName, description, isDelete) values (:categoryName, :description, :isDelete)");
    $statement->execute([
        ':categoryName' => $categoryName,
        ':description' => $description,
        ':isDelete' => 0,
    ]);
    
    return $statement->rowCount() > 0;
}
function getCategory(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from category where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getCategories() : array
{
    global $connection;
    $statement = $connection->prepare("select * from category where isDelete = 0");
    $statement->execute();
    return $statement->fetchAll();
}

function updateCategory(string $categoryName, string $description, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update category set categoryName = :categoryName, description = :description where id = :id");
    $statement->execute([
        ':categoryName' => $categoryName,
        ':description' => $description,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}


function deleteCategory(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update category set isDelete = :isDelete where id = :id");
    $statement->execute([
        ':isDelete' => 1,
        ':id' => $id
    ]);

    return $statement->rowCount() > 0;
}