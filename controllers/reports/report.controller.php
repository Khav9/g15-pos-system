<?php
require 'database/database.php';
require 'models/order.model.php';
$ordersAdmin = getOrders();

$ordersUser = getOrdersUser($_SESSION['user'][0]);

require "views/reports/report.view.php";