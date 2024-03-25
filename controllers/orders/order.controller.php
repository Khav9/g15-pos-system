<?php

require_once("database/database.php");
require_once("models/product.model.php");
require_once("models/order.model.php");
require_once("models/customer.model.php");

$products = [];
$productData = $_SESSION['productData'] ?? [];
if (!empty($_POST['code']) && !empty($_POST['quantity'])) {
    $productcode = $_POST['code'];
    $productqty = $_POST['quantity'];
    $availableQty = getProductQuantity($connection, $productcode);
    if ($availableQty !== false) {
        if ($productqty > $availableQty) {
            $_SESSION['status'] = "Cannot order more than the available quantity  $availableQty.";
        } else {
            $productData = $_SESSION['productData'] ?? [];
            $isProductFound = false;
            foreach ($productData as $key => $order) {
                if (isset($order['code']) && $order['code'] == $productcode) {
                    $totalQuantity = $order['quantity'] + $productqty;
                    if ($totalQuantity > $availableQty) {
                        $_SESSION['status'] = "Cannot increase quantity beyond the available quantity.";
                        $isProductFound = true;
                    } else {
                        $productData[$key]['quantity'] = $totalQuantity;
                        $isProductFound = true;
                    }
                }
            }
            if (!$isProductFound) {
                $productBarcode =  getBarcode($connection, $productcode);
                if ($productBarcode) {
                    $productData[] = [
                        "code" => $productBarcode['code'],
                        "name" => $productBarcode['name'],
                        "image" => $productBarcode['image'],
                        "quantity" => $productqty,
                        "price" => intval($productBarcode['price']),

                    ];
                }
            }
            $_SESSION['productData'] = $productData;
        };
    } else {
        $_SESSION['status'] = "No product with the entered  barcord $productcode. Please enter a valid product code.";
    }
}

require "views/orders/order.view.php";
