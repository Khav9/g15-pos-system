<?php

require "../../database/database.php";

$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id))
{
    require '../../models/userManage.model.php';
    $isDelete = deleteUser($id);
    if ($isDelete) {
          header('Location: /users');
          exit();
    }
}