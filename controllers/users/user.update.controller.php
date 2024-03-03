<?php
session_start();
require "../../database/database.php";
require "../../models/userManage.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $_SESSION['userUpdate'] = [
            "error" => "",
            "success" => "",
      ];
      $isEmail = false;
      $isPhone = false;
      $isName = false;

      $regexPhone = "/^\(\d{3}\)\s?\d{3}-\d{3}-\d{3}$/";
      $regexEmail = "/^[a-z]{1,10}\.[a-z]{1,10}\@[a-z]{1,10}\.[a-z]{1,3}$/";

      if (preg_match($regexPhone, secureData($_POST['phone']))) {
            $_SESSION['errors']['borderPhone'] = 'is-valid';
            $isPhone = true;
      } else {
            $_SESSION['errors']['borderPhone'] = 'is-invalid';
            $isPhone = false;
            $_SESSION['errors']['phone'] = 'Ex: (855) 010-250-337 ';
      };

      if (!empty($_POST['name'])) {
            $_SESSION['errors']['borderName'] = 'is-valid';
            $isName = true;
      } else {
            $_SESSION['errors']['borderName'] = 'is-invalid';
            $_SESSION['errors']['username'] = 'Please fill username !';
            $isName = false;
      }

      if (preg_match($regexEmail, secureData($_POST['email']))) {
            $_SESSION['errors']['borderEmail'] = 'is-valid';
            $isEmail = true;
      } else {
            $_SESSION['errors']['borderEmail'] = 'is-invalid';
            $isEmail = false;
            $_SESSION['errors']['email'] = 'Ex: khav.saroeun@gmail.org';
      }


      if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
            if ($isEmail && $isPhone && $isName) {
                  $isUpdate = updateUser($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['id']);
                  header('location: /users');
                  $_SESSION['userUpdate']['success'] = "Account successfully updated";
            } else {
                  header('location: /users');
                  $_SESSION['userUpdate']['error'] = "Something went wrong please try again !";
            }
      } else {
            header('location: /users');
            $_SESSION['userUpdate']['error'] = "Please try again !";
      }
}
