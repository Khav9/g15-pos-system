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