<?php

require "../../database/database.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "../../models/userManage.model.php";

    if (isset($_FILES['imagePro']) && $_FILES['imagePro']['error'] !== UPLOAD_ERR_NO_FILE) {

        $imgProduct = $_FILES['imagePro'];
        // Image upload
        $directory = "../../assets/profiles/";
        $target_file = $directory . '.' . basename($_FILES['imagePro']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $checkImageSize = getimagesize($_FILES["imagePro"]["tmp_name"]);
        if ($checkImageSize) {
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                header('Location: /profile');
            } else {

                $imageExtension = explode('.', $target_file)[6];
                $newFileName = uniqid();
                $nameInDirectory = $directory . $newFileName . '.' . $imageExtension;
                $nameInDB = $newFileName . '.' . $imageExtension;
                move_uploaded_file($_FILES["imagePro"]["tmp_name"], $nameInDirectory);

                $isUpdateProfile = updateImageUser($nameInDB, $_POST['id']);

                unset($_SESSION['user']);
                $_SESSION['user'] = getUser($_POST['id']);
                header('location: /profile');
            }
        }
    } else {
        //can add alert
        header('location: /profile');
    }
}
