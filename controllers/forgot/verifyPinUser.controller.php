<?php
session_start();
require '../../database/database.php';
$emailUser =  $_SESSION['emailOne'];

if ($_SERVER['REQUEST_METHOD'] === "POST"){
      $pin = htmlspecialchars($_POST['pin']);
      if (isset($pin)){
            require '../../models/userManage.model.php';
            $pinDB = getPin($emailUser);
            $pinDB = $pinDB[0];
            if ($pin === $pinDB){
                  $defaul = 0;
                  updatePin($emailUser,$defaul);
                 header('location: /newPassword');
            }else{
                  header('location: /verifyPIN');
            }
      }else{
            header('location: /verifyPIN');
      }
}
