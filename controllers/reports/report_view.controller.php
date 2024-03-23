<?php
require 'database/database.php';
require 'models/orderdetail.model.php';
require 'models/order.model.php';
$id = $_GET['id'];
$orderDetails = getOrderDetails($id);
$orders = getOrderOne($id);
date_default_timezone_get();
date_default_timezone_set('Asia/Phnom_Penh');
$time = date("H:i:s");
require "views/reports/report_view.view.php";

