<?php
require 'database/database.php';
require 'models/order.model.php';
$user = $_SESSION['user'];
$userId = $user[0];
$ordersAdmin = getOrders();
$ordersUser = getOrdersUser($userId);

require "views/reports/report.view.php";