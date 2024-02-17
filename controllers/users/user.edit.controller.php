
<?php

require "database/database.php";

$id = $_GET["id"] ? $_GET["id"] : null;

if (isset($id)) {
      require 'models/userManage.model.php';
      $userUpdate = getUser($id);
    //   $passwordHash = $userUpdate[3];
      require "views/users/user.edit.view.php";
}