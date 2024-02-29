<?php

require "../../database/database.php";
require "../../models/userManage.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = htmlspecialchars($_POST['name']);
      $email = htmlspecialchars($_POST['email']);
      $imgProfile = $_FILES['image'];
      $password = htmlspecialchars($_POST['password']);
      $phone = htmlspecialchars($_POST['phone']);

      if (!empty($name) && !empty($email) && !empty($password) && !empty($phone)) {
            $encryptPassword = password_hash($password, PASSWORD_BCRYPT);
            if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {


                  // Image upload
                  $directory = "../../assets/profiles/";
                  $target_file = $directory . '.' . basename($_FILES['image']['name']);
                  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                  $checkImageSize = getimagesize($_FILES["image"]["tmp_name"]);
                  if ($checkImageSize) {
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                              $_SESSION['error'] = "Wrong Image extension!";
                              header('Location: /userCreate');
                        } else {

                              $imageExtension = explode('.', $target_file)[6];
                              $newFileName = uniqid();
                              $nameInDirectory = $directory . $newFileName . '.' . $imageExtension;
                              $nameInDB = $newFileName . '.' . $imageExtension;
                              move_uploaded_file($_FILES["image"]["tmp_name"], $nameInDirectory);
                              $user = accountExist($email);
                              if (count($user) == 0) {
                                    createAccount($name, $email, $phone, $encryptPassword, $nameInDB);
                                    header('Location: /users');
                                    $_SESSION['success'] = "Account successfully created";
                              } else {
                                    $_SESSION['error'] = "Account already exists";
                                    header('Location: /users');
                              }
                        }
                  } else {
                        $_SESSION['error'] = "Not Image file!";
                        header('Location: /users');
                  }
            } else {
                  $imageUser = "../../assets/profiles/65e017b766169.png";
                  createAccount($name, $email, $phone, $encryptPassword, $imageUser);
                  header('Location: /users');
            }
      } else {
            $_SESSION['error'] = "Please fill all the fields";
            header('Location: /users');
      }
}
