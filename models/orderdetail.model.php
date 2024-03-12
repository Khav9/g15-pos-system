<?php
function createOrderDetail(int $orderID,string $productName,int $quantity,int $unitprice,int $subprice ) : bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO orderDetails(orderID,productName,quantity,unitprice,subprice) values (:orderID,:productName,:quantity,:unitprice,:subprice)");
    $statement->execute([
        ':orderID' => $orderID,
        ':productName' => $productName,
        ':quantity' => $quantity,
        ':unitprice' => $unitprice,
        ':subprice' => $subprice,

    ]);

    return $statement->rowCount() > 0;
}

function getOrderDetails(int $orderID) : array{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM orderDetails inner join orders on orderDetails.orderID = orders.id where orderDetails.orderID = :id");
    $statement->execute([
        ':id' => $orderID,
    ]);
    return $statement->fetchAll();
}