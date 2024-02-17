<?php

require "../../database/database.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['phone'])and !empty($_POST['role'])) {
            require "../../models/userManage.model.php";

            $isUpdate = updateUser($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['role'], $_POST['id']);

            header('location: /users');
      }
}

