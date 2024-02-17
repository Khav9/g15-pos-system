<?php

function createUser(string $name, string $email, string $password, string $role,string $image, string $phone) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into users (name, email,password,role,isDelete,image,phone) values (:name, :email, :password, :role, :isDelete, :image, :phone)");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
        ':role' => $role,
        ':isDelete' => 0,
        ':image' => $image,
        ':phone' => $phone,
    ]);

    return $statement->rowCount() > 0;
}
function getUsers() : array
{
    global $connection;
    $statement = $connection->prepare("select * from users");
    $statement->execute();
    return $statement->fetchAll();
}

function getUser(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from users where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function updateUser(string $name, string $email, string $phone, string $role, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update users set name = :name, email = :email, phone = :phone, role = :role where id = :id");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':role' => $role,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}


function deleteUser(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from users where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}