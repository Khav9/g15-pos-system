<?php
require 'database/database.php';
require 'models/orderdetail.model.php';
require 'models/order.model.php';
$id = $_GET['id'];
$orderDetails = getOrderDetails($id);
$orders = getOrderOne($id);

require "views/reports/report_view.view.php";

