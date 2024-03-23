<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
session_start();
require_once("../../models/product.model.php");
require_once("../../models/order.model.php");
require_once("../../models/orderdetail.model.php");
require_once("../../models/userManage.model.php");
require_once("../../database/database.php");
$user = $_SESSION['user'];

$reports = [];
if (isset($_POST['report'])) {
      unset($_POST['report']);
      $startDate = $_POST['startDate'];
      $dueDate = $_POST['dueDate'];
      if (!empty($startDate) && !empty($dueDate)) {
            $reports = getReports($startDate,$dueDate);
      }
}
?>

