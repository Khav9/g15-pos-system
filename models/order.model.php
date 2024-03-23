<?php
function createOrder(int $userId, int $totalPrice, int $items, $date, string $status): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO orders(userId,totalPrice,date,qty,status) values (:userId,:totalPrice,:date,:qty,:status)");
    $statement->execute([
        ':userId' => $userId,
        ':totalPrice' => $totalPrice,
        ':qty' => $items,
        ':date' => $date,
        ':status' => $status,
        
    ]);

    return $statement->rowCount() > 0;
}

function getOrder(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders ORDER BY id DESC LIMIT 1");
    $statement->execute();
    return $statement->fetch();
}

//orders admin
function getOrders(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders INNER JOIN users ON orders.userId = users.id ORDER BY orders.id DESC");
    $statement->execute();
    return $statement->fetchAll();
}
//orders user
function getOrdersUser(int $id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders INNER JOIN users ON orders.userId = users.id WHERE users.id = :id ORDER BY orders.id DESC");
    $statement->execute([':id' => $id]);
    return $statement->fetchAll();
}
function deleteOrder(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete FROM orders where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
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
function getOrderToday(string $today): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders WHERE date = :today");
    $statement->execute([':today' => $today]);
    return $statement->fetchAll();
}

//(user)
//need correct for member
function getOrderTodayUser(string $today, int $id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders WHERE date = :today and userId = :id");
    $statement->execute([':today' => $today, ':id' => $id]);
    return $statement->fetchAll();
}
function filterDate(string $date)
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders WHERE date = :date ORDER BY orders.id DESC");
    $statement->bindValue(':date', $date);
    $statement->execute();
    $orders = $statement->fetchAll();
}
function reportDate(string $date)
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orders WHERE date = :date ORDER BY orders.id DESC");
    $statement->bindValue(':date', $date);
    $statement->execute();
    return $statement->fetchAll();
}

//report on dashboard
function getReports(string $startDate,string $endDate): array
{
    global $connection;
    $statement = $connection->prepare("SELECT *,products.name FROM orderDetails inner join orders on orderDetails.orderID = orders.id  inner join products on orderDetails.productName = products.code WHERE date > :start and date < :end");
    $statement->execute([':start' => $startDate, ':end' => $endDate]);
    return $statement->fetchAll();
}

//  inner join products on orderDetails.productName = products.code where orderDetails.orderID = orders.id and orderDetails.orderID = :id 