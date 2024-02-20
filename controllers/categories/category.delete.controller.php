<?php

require "../../database/database.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_GET['id'] ? $_GET['id'] : null;
    if (isset($id)) {
        require '../../models/category.model.php';
        $isDelete = deleteCategory($id);
        if ($isDelete) {
            header('Location: /categories');
            exit();
        }
    }
}
