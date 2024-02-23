<?php

function createAccount(string $name, string $email, string $phone, string $password, string $image): bool {
    global $connection;
    $statement = $connection->prepare("INSERT INTO users (userName, email, phone, password, role, image) 
    VALUES (:userName, :email,:phone, :password, :role, :image)");
    $statement->execute([
        ':userName' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':password' => $password,
        ':role' => 'user',
        ':image' => $image
    ]);

    return $statement->rowCount() > 0;
}

function getUsers(): array {
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE role = :role ORDER BY id DESC ");
    $statement->execute([
        ':role' => 'user'
    ]);
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
    $statement = $connection->prepare("update users set userName = :userName, email = :email, phone = :phone, role = :role where id = :id");
    $statement->execute([
        ':userName' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':role' => $role,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}

//update image photo (only for images)
function updateImageUser(string $image, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update users set image = :image where id = :id");
    $statement->execute([
        ':image' => $image,
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


//for login

function accountExist(string $email): array
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
