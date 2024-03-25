<?php
require 'database/database.php';
require 'models/order.model.php';
$ordersAdmin = getOrders();

$ordersUser = getOrdersUser($_SESSION['user'][0]);

// Check if the date filter form is submitted
if ($_SESSION['user']['role'] === 'admin') {
      $orders = $ordersAdmin;
} else {
      $orders = $ordersUser;
}

$filteredOrders = $orders;
if (isset($_POST['filter'])) {
      $filteredOrders = [];
      // Get the input date
      $inputDate = $_POST['date'];
      foreach ($orders as $order) {
            if ($order['date'] == $inputDate) {
                  $filteredOrders[] = $order;
            }
      }
} 

require "views/reports/report.view.php";