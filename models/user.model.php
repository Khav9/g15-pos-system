<?php

function createAccount(string $name, string $email, string $password) : bool
{
    global $connection;
    $defaultRole = 'user';
    $statement = $connection->prepare("insert into users (name, email, password, role) values (:name, :email, :password, :role)");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
        ':role' => $defaultRole
    ]);
    
    return $statement->rowCount() > 0;
}

function getUser(string $email): array
{
    global $connection;
    $statement = $connection->prepare("select * from users where email = :email");
    $statement->execute([':email' => $email]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}