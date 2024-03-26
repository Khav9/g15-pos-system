<?php
session_start();
require '../../database/database.php';
$email = $_SESSION['emailOne'];
if ($_SERVER['REQUEST_METHOD'] === "POST"){
      $password = htmlspecialchars($_POST['newPassword']);
      $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
      if (!empty($password) && !empty($confirmPassword)){
            if ($password === $confirmPassword){
                  require '../../models/userManage.model.php';
                  $encryptPassword = password_hash($password, PASSWORD_BCRYPT);
      
                  updatePassword($email,$encryptPassword);
                  header('location: /');
            }else{
                  header('location: /newPassword');
            }
      }else{
            header('location: /newPassword');
      }
}