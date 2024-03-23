<?php
session_start();
require "../../database/database.php";
require "../../models/userManage.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = htmlspecialchars($_POST['name']);
      $email = htmlspecialchars($_POST['email']);
      $imgProfile = $_FILES['image'];
      $password = htmlspecialchars($_POST['password']);
      $phone = htmlspecialchars($_POST['phone']);

      $_SESSION['errors'] = $errors = [
            "username" => "",
            "phone" => "",
            "password" => "",
            "email" => "",
            "borderName" => "",
            "borderPhone" => "",
            "borderPassword" => "",
            "borderEmail" => "",
            "success" => "",
            "error" => "",
      ];

      $regexPassword = "/^(?=.*[!@#$%&])(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9!@#$%&]{8,}$/";
      $regexPhone = "/^\(\d{3}\)\s?\d{3}-\d{3}-\d{3}$/";

      $isPassword = false;
      $isPhone = false;
      $isEmail = false;
      $isName = false;

      if (preg_match($regexPassword, secureData($_POST['password']))) {
            $_SESSION['errors']['borderPassword'] = 'is-valid';
            $isPassword = true;
      } else {
            $_SESSION['errors']['borderPassword'] = 'is-invalid';
            $isPassword = false;
            $_SESSION['errors']['password'] = 'Invalid password. Please try again !';
      }

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

      if (!empty($name) && !empty($email) && !empty($password) && !empty($phone)) {
            if ($isPassword && $isEmail && $isPhone && $isName) {
                  $encryptPassword = password_hash($password, PASSWORD_BCRYPT);
                  if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
                        // Image upload
                        $directory = "../../assets/profiles/";
                        $target_file = $directory . '.' . basename($_FILES['image']['name']);
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $checkImageSize = getimagesize($_FILES["image"]["tmp_name"]);
                        if ($checkImageSize) {
                              $imageExtension = explode('.', $target_file)[6];
                              $newFileName = uniqid();
                              $nameInDirectory = $directory . $newFileName . '.' . $imageExtension;
                              $nameInDB = $newFileName . '.' . $imageExtension;
                              move_uploaded_file($_FILES["image"]["tmp_name"], $nameInDirectory);
                              $user = accountExist($email);
                              if (count($user) == 0) {
                                    createAccount($name, $email, $phone, $encryptPassword, $nameInDB);
                                    unset($_SESSION['errors']);
                                    header('Location: /users');
                                    $_SESSION['errors']['success'] = "Account successfully created";
                              } else {
                                    header('Location: /users');
                                    $_SESSION['errors']['error'] = "Account already exists";
                              }
                        }
                  } else {
                        $imageUser = "../../assets/profiles/65ed60412dbd7.png";
                        createAccount($name, $email, $phone, $encryptPassword, $imageUser);
                        header('Location: /users');
                        $_SESSION['errors']['success'] = "Account successfully created";
                  }
            } else {
                  header('Location: /users');
                  $_SESSION['errors']['error'] = "something went wrong please try again !";
            }
      } else {
            $_SESSION['errors']['error'] = "Please fill all information !";
            header('Location: /users');
      }
} else {
      $_SESSION['errors']['error'] = "Please fill all information !";
      header('Location: /users');
}
