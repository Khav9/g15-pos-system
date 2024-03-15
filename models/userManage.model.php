<?php

function createAccount(string $name, string $email, string $phone, string $password, string $image): bool {
    global $connection;
    $statement = $connection->prepare("INSERT INTO users (userName, email, phone, password, role, image,pin) 
    VALUES (:userName, :email,:phone, :password, :role, :image, :pin)");
    $statement->execute([
        ':userName' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':password' => $password,
        ':role' => 'user',
        ':image' => $image,
        ':pin' => 0
    ]);

    return $statement->rowCount() > 0;
}

function getUsers(): array {
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE role = :role and isDelete = 0 ORDER BY id DESC ");
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

function updateUser(string $name, string $email, string $phone, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update users set userName = :userName, email = :email, phone = :phone where id = :id");
    $statement->execute([
        ':userName' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}
function updateInfoUser(string $name, string $email, string $phone ,$id) : bool
{
    global $connection;
    $statement = $connection->prepare("update users set userName = :userName, email = :email, phone = :phone where id = :id");
    $statement->execute([
        ':userName' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}
//update only password
function updatePassword(string $email, string $password) : bool
{
    global $connection;
    $statement = $connection->prepare("update users set  password = :password where email = :email");
    $statement->execute([
        ':email' => $email,
        ':password' => $password,
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

//Add PIN code 

function updatePin(string $email, int $pin){
    global $connection;
    $statement = $connection->prepare("update users set pin = :pin where email = :email");
    $statement->execute([
        ':email' => $email,
        ':pin' => $pin

    ]);

    return $statement->rowCount() > 0;
}
function getPin(string $email) : array
{
    global $connection;
    $statement = $connection->prepare("select pin from users where email = :email");
    $statement->execute([':email' => $email]);
    return $statement->fetch();
}


//
function deleteUser(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update users set isDelete = 1 where id = :id");
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
//securedata
function secureData($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}