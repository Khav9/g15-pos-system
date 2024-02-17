<?php

require "../../database/database.php";
require "../../models/userManage.model.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
      if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['password'])and !empty($_POST['role']and !empty($_POST['phone'])))
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $role = $_POST['role'];
      $image = $_POST['profile'];
      $phone = $_POST['phone'];
      $passwordHash = password_hash($password, PASSWORD_BCRYPT);

      $isCreate = createUser($name, $email, $passwordHash, $role, $image, $phone);
      //it return true or false
 
      if ($isCreate){
       header ("location: /users");
      }else{
       header ("location: /userCreate");
      }
 }

?>