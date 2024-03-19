<?php
session_start();
require "../../database/database.php";
require "../../models/userManage.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $_SESSION['errors'] = [
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

      if (!empty($email)) {
            $_SESSION['errors']['borderEmail'] = 'is-valid';
            $isEmail = true;
      } else {
            $_SESSION['errors']['borderEmail'] = 'is-invalid';
            $isEmail = false;
            $_SESSION['errors']['email'] = 'Please fill Email account';
      }

      $name = htmlspecialchars($_POST['name']);
      $email = htmlspecialchars($_POST['email']);
      $phone = htmlspecialchars($_POST['phone']);


      if (!empty($name) && !empty($email) && !empty($phone)) {
            if ($isEmail && $isPhone && $isName) {
                  $isUpdate = updateUser($name, $email, $phone, $_POST['id']);
                  header('location: /users');
                  $_SESSION['errors']['success'] = "Account successfully updated";
            } else {
                  header('location: /users');
                  $_SESSION['errors']['error'] = "Something went wrong please try again !";
            }
      } else {
            header('location: /users');
            $_SESSION['errors']['error'] = "Please try again !";
      }
}
