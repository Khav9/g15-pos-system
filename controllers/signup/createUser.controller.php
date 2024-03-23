<?php
require_once '../../database/database.php';
require_once '../../models/userManage.model.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
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
    ];

    $regexPassword = "/^(?=.*[!@#$%&])(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9!@#$%&]{8,}$/";
    $regexPhone = "/^\(\d{3}\)\s?\d{3}-\d{3}-\d{3}$/";

    $isPassword = false;
    $isPhone = false;
    $isEmail = false;

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

    if (!empty($name)) {
        $_SESSION['errors']['borderName'] = 'is-valid';
    } else {
        $_SESSION['errors']['borderName'] = 'is-invalid';
        $_SESSION['errors']['username'] = 'Please fill username !';
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

        if ($isPassword && $isPhone && $isEmail) {

            $encryptPassword = password_hash($password, PASSWORD_BCRYPT);
            $user = accountExist($email);
            if (count($user) == 0) {
                $image = "../../assets/profiles/65e26d8b9d3fb.png";
                createAccount($name, $email, $phone, $encryptPassword, $image);
                $_SESSION['success'] = "Account successfully created";
                header('Location: /');
            } else {
                $_SESSION['error'] = "Account already exists";
                header('Location: /');
            }
        } else {
            header('Location: /signup');
        }
    } else {
        // unset($_SESSION['errors']);
        header('location: /signup');
    }
} else {

    header('Location: /signup');
}
