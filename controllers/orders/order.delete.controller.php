<?php
// require_once("../../models/product.model.php");
$productData = $_SESSION['productData'] ?? [];
if (filter_input(INPUT_GET, 'action') == 'delete' && isset($_GET['id'])) {
    $productId = $_GET['id'];
    foreach ($productData as $key => $order) {
        if ($key == $productId) {
            unset($productData[$key]);
            $_SESSION['productData'] = $productData;
            header('Location: /orders');
            exit();
            
        }
    }
}
