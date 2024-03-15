<?php
function createOrder(int $userId ,int $totalPrice, int $items,$date,string $status) : bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO orders(userId,totalPrice,date,qty,status) values (:userId,:totalPrice,:date,:qty,:status)");
    $statement->execute([
        ':userId' => $userId,
        ':totalPrice' => $totalPrice,
        ':qty' => $items,
        ':date'=>$date,
        ':status' => $status,
    ]);

    return $statement->rowCount() > 0;
}

function getOrder() : array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders ORDER BY id DESC LIMIT 1");
    $statement->execute();
    return $statement->fetch();
}

function getOrders() : array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders INNER JOIN users ON orders.userId = users.id ORDER BY orders.id DESC");
    $statement->execute();
    return $statement->fetchAll();
}

function getOrderOne(int $id)
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders INNER JOIN users ON orders.userId = users.id WHERE orders.id = :id ORDER BY orders.id DESC LIMIT 1");
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
    $statement = $connection->prepare("SELECT * FROM orders WHERE date = :today and userId = :id");
    $statement->execute([':today' => $today, ':id' => $id]);
    return $statement->fetchAll();
}