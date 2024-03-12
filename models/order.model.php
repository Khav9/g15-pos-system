<?php
function createOrder(int $cus_id ,int $totalPrice) : bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO orders(cus_id,totalPrice) values (:cus_id,:totalPrice)");
    $statement->execute([
        ':cus_id' => $cus_id,
        ':totalPrice' => $totalPrice,

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