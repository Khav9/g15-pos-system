<?php
function createCustomer(string $firstName, string $lastName, string $phoneNumber) : bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO customers(firstName, lastName,phoneNumber) values (:firstName, :lastName,:phoneNumber)");
    $statement->execute([
        ':firstName' => $firstName,
        ':lastName' => $lastName,
        ':phoneNumber' => $phoneNumber,
    ]);

    return $statement->rowCount() > 0;
}
function getCustomers() : array
{
    global $connection;
    $statement = $connection->prepare("select * from customers order by cus_id desc ");
    $statement->execute();
    return $statement->fetchAll();
}

function getCustomer(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from customers where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}