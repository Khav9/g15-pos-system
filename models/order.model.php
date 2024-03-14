<?php
function createOrder(int $cus_id ,int $totalPrice, int $items) : bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO orders(cus_id,totalPrice,qty) values (:cus_id,:totalPrice,:qty)");
    $statement->execute([
        ':cus_id' => $cus_id,
        ':totalPrice' => $totalPrice,
        ':qty' => $items,

    ]);

    return $statement->rowCount() > 0;
}


function getOrder() : array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders order by id desc limit 1");
    $statement->execute();
    return $statement->fetch();
}

function getOrders() : array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders inner join customers on orders.cus_id = customers.cus_id order by orders.id desc");
    $statement->execute();
    return $statement->fetchAll();
}

function getOrderOne(int $id){
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders inner join customers on orders.cus_id = customers.cus_id where orders.id = :id order by orders.id desc limit 1");
    $statement->execute([
        ':id' => $id,
    ]);
    return $statement->fetch();
}

//order in today
function getOrderToday(string $yesterday) : array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders WHERE date > :yesterday");
    $statement->execute([':yesterday' => $yesterday]);
    return $statement->fetchAll();
}