<?php
function createOrder(int $cus_id ,int $totalPrice, int $items,string $date) : bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO orders(cus_id,totalPrice,qty,date) values (:cus_id,:totalPrice,:qty,:date)");
    $statement->execute([
        ':cus_id' => $cus_id,
        ':totalPrice' => $totalPrice,
        ':qty' => $items,
        ':date' => $date,

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

//order in today (admin)
function getOrderToday(string $today) : array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders WHERE date = :today");
    $statement->execute([':today' => $today]);
    return $statement->fetchAll();
}

//(user)
//need correct for member
function getOrderTodayUser(string $today,int $id) : array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders WHERE date = :today and cus_id = :id");
    $statement->execute([':today' => $today, ':id' => $id]);
    return $statement->fetchAll();
}