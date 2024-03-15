<?php
require_once('../../database/database.php');
require_once('../../models/customer.model.php');
require_once('../../models/product.model.php');
require_once('../../models/order.model.php');
require_once('../../models/orderdetail.model.php');
session_start();
$customerIds = getCustomers();
$products = getProducts($_SESSION['today']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //note : $_SESSION['orders'] = $_SESSION['productData']
    $customerOder = $_POST['cus_id'];
    if (!empty($customerOder) &&  isset($_SESSION['productData'])) {
        // Catch the customer's ID
        $cus_id = $_POST['cus_id'];
        // $payment = $_POST['paymentMethod']; 
        // var_dump($payment);
        
        
        $totalPrice = 0;
        $item = 0;
        foreach ($_SESSION['productData'] as $product) {
            $qty = $product['quantity'];
            $price = $product['price'];
            $item += 1;
            $totalPrice += $qty * $price;
        }
        // Insert the order into the database
        $query = createOrder($customerOder, $totalPrice,$item);

        $lastOrder = getOrder();
        $subprice=0;
        $orderID = $lastOrder[0];
        foreach ($_SESSION['productData'] as $product) {
            // $productName = $product['name'];
            $productCode = $product['code'];
            $quantity = $product['quantity'];
            $unitprice = $product['price'];
           
            $subprice = $quantity * $unitprice;
            // Insert the order into the database
            createOrderDetail($orderID,$productCode,$quantity,$unitprice,$subprice);

            foreach ($products as $key => $value) {
                if ($value['code'] == $productCode){
                    $qty = $value[3] - $quantity;
                    updateQty($qty,$productCode);
                }
            }
        }
        // Order successfully inserted
        unset($_SESSION['productData']);
        unset($_SESSION['orders']);
        header('location: /orders');
    } else {
        $_SESSION['error_order'] = "No product or No custumer. Please enter a valid all the fill.";
        header('location: /orders');
    }
}
