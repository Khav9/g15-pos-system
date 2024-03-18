<?php
require "../../database/database.php";

$id = $_POST['id'] ? $_POST['id'] : null;
if (isset($id)) {
    require '../../models/order.model.php';
    $isDelete = deleteOrder($id);
    if ($isDelete) {
        header('Location: /reports');
        exit();
    }else{
        header('Location: /reports');
    }
}
