<?php

require "../../database/database.php";
require "../../models/userManage.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])) {

            $isUpdate = updateUser($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['id']);

            header('location: /users');
      }else{
            header('location: /users');
      }
}
