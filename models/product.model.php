<?php

function createProduct(string $name, int $code, int $price, int $quantity, string $category, string $asign, $date, string $image,string $create): bool
{
    global $connection;
    $statement = $connection->prepare("insert into  products(name, code, price, qty, categoryID, userID, expire, isDelete, image,createAt) values (:name, :code, :price, :qty, :categoryID, :userID, :expire , :isDelete, :image, :create)");
    $statement->execute([
        ':name' => $name,
        ':code' => $code,
        ':price' => $price,
        ':qty' => $quantity,
        ':categoryID' => $category,
        ':userID' => $asign,
        ':expire' => $date,
        ':isDelete' => 0,
        ':image' => $image,
        ':create' => $create,

    ]);

    return $statement->rowCount() > 0;
}
function getProductAll()
{
    global $connection;
    $statement = $connection->prepare('SELECT * FROM products');
    $statement->execute();
    $orders = $statement->fetchAll();
}
function getProduct(int $id): array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name,products.code, products.price, products.qty,products.expire, products.image, category.categoryName, users.userName from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getProducts(string $date): array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name, products.price, products.qty, products.image, products.code,products.categoryID,products.userID, category.categoryName, users.userName from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.isDelete = 0 and products.expire > :date order by products.id desc");
    $statement->execute([':date' => $date]);
    return $statement->fetchAll();
}

function updateProduct(string $name, int $code, int $price, int $quantity, string $category, string $asign, string $date, string $image, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("update products set name = :name, code = :code, price = :price, qty = :quantity, categoryID = :category, userID = :asign, image = :image, expire = :date where id = :id");
    $statement->execute([
        ':name' => $name,
        ':code' => $code,
        ':price' => $price,
        ':quantity' => $quantity,
        ':category' => $category,
        ':asign' => $asign,
        ':date' => $date,
        ':image' => $image,
        ':id' => $id
    ]);

    return $statement->rowCount() > 0;
}

// by don't update image
function updateProNotImage(string $name, string $code, int $price, int $quantity, string $category, string $asign, string $date, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("update products set name = :name, code = :code, price = :price, qty = :quantity, categoryID = :category, userID = :asign, expire = :date where id = :id");
    $statement->execute([
        ':name' => $name,
        ':code' => $code,
        ':price' => $price,
        ':quantity' => $quantity,
        ':category' => $category,
        ':asign' => $asign,
        ':date' => $date,
        ':id' => $id,
    ]);

    return $statement->rowCount() > 0;
}

function deleteProduct(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE products SET isDelete = :isDelete  where id = :id");
    $statement->execute([
        'isDelete' => 1,
        ':id' => $id
    ]);
    return $statement->rowCount() > 0;
}


//get products by using name login

function getProductsByUser(int $id, string $date): array
{
    global $connection;
    $statement = $connection->prepare("select products.id, products.name, products.price, products.qty, products.image, products.code, category.categoryName, users.userName from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.isDelete = 0 and products.expire > :date and users.id = :id order by products.id desc");
    $statement->execute([
        ':id' => $id,
        ':date' => $date,
    ]);
    return $statement->fetchAll();
}

function sumNumber(array $products)
{
    $total = 0;
    foreach ($products as $key => $product) {
        $total += $product['qty'];
    }
    return $total;
}

//update qty admin
function updateQty(int $qty, int $code): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE products SET qty = :qty  where code = :code" );
    $statement->execute([
        ':qty' => $qty,
        ':code' => $code
    ]);
    return $statement->rowCount() > 0;
}
function getProductQuantity($connection, $productcode)
{
    $statement = $connection->prepare("SELECT qty FROM products WHERE code = :code and isDelete=0 LIMIT 1");
    $statement->bindValue(':code', $productcode);
    if ($statement->execute()) {
        $row = $statement->fetch();
        if ($row !== false && isset($row['qty'])) {
            return $row['qty'];
        }
    }
    return false; 
}
function getBarcode($connection, $productcode){
    global $connection;
    $statement= $connection->prepare("SELECT * FROM products WHERE code = :code and isDelete=0 LIMIT 1");
    $statement->bindValue(':code',$productcode);
    if ($statement->execute()) {
        $row = $statement->fetch();
        
    }
    return $row;
}

//get new product
function geNewtProducts(int $id, string $date): array
{
    global $connection;
    $statement = $connection->prepare("select * from products inner join category on products.categoryID = category.id inner join users on products.userID = users.id where products.isDelete = 0 and products.CreateAt = :date");
    $statement->execute([
        // ':id' => $id,
        ':date' => $date,
    ]);
    return $statement->fetchAll();
}