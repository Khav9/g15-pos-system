<?php

require "../../database/database.php";

$id = $_POST['id'] ? $_POST['id'] : null;
if (isset($id))
{
    require '../../models/userManage.model.php';
    $isDelete = deleteUser($id);
    if ($isDelete) {
          header('Location: /users');
          exit();
    }
}else{
    header('Location: /users');
}