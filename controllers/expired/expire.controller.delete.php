<?php

require "../../database/database.php";

$id = $_POST['id'] ? $_POST['id'] : null;
if (isset($id))
{
    require '../../models/expired.model.php';
    $isDelete = deleteExpired($id);
    if ($isDelete) {
          header('Location: /expired');
          exit();
    }
}