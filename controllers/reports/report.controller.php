<?php
require 'database/database.php';
require 'models/order.model.php';
$orders = getOrders();

require "views/reports/report.view.php";