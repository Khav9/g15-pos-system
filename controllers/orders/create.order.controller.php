<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php

session_start();
require_once("../../database/database.php");
require_once("../../models/order.model.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requiredFields = ['customerName', 'product', 'date', 'quantity', 'price', 'discount', 'total'];
    $isValid = true;
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field])) {
            $isValid = false;
            break;
        }
    }

    if ($isValid) {
        $customerName = $_POST['customerName'];
        $product =$_POST['product'];
        $date = $_POST['date'];

        $price = $_POST['price'];
        $quantity =$_POST['quantity'];
        $discount = $_POST['discount'];
        $total = $_POST['total'];
        
        // $price = number_format($price, 2);
        // $discount = $discount . ("%");

        // // Calculate the total price
        $total = $price * $quantity - ($price * $quantity * $discount / 100);
        // $total = number_format($total, 2);
        // $discount = "$" . $discount ;
        // $total = "$" . $total ;
        // // Create the order
        $order = createOrder($customerName, $product,$price, $quantity, $discount, $total);

        if ($order == true) {
            header("Location: /orders");
        } else {
            header("Location: /views/orders/create.order.view.php");
        }
    } else {
        // Handle the case where not all required fields are set
        header("Location: /views/orders/create.order.view.php");
    }
}
?>