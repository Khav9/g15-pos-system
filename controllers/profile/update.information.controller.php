<?php

require "../../database/database.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require "../../models/userManage.model.php";
    $role = $_POST['role'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];

    updateInfoUser($role, $email, $phone, $id);

    unset($_SESSION['user']);
    $_SESSION['user'] = getUser($_POST['id']);

    header("location: /profile");
}
