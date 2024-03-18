<?php
session_start();
require_once '../../database/database.php';
require_once '../../models/userManage.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) and !empty($_POST['password'])) {
        // Escape the query string to prevent SQL injection.
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']); 

        // Get data from database
        $user = accountExist($email);

        // Check if user exists
        if (count($user) > 0) {
            // Check if password is correct
            if (password_verify($password, $user[4])) {
                $_SESSION['user'] = $user;
                $_SESSION['success'] = "Login successful";

                date_default_timezone_get();
                date_default_timezone_set('Asia/Phnom_Penh');
                $today = date("Y-m-d");
                $_SESSION['today'] = $today;
                
                header('Location: /admin');
            } else {
                // echo "Password is incorrect";
                $_SESSION['error'] = "Wrong password";
                $_SESSION['borderPassword'] = "is-invalid";
                header('location: /');
            }
        } else {
            // echo "No user found";
            $_SESSION['notFound'] = "No user found";
            $_SESSION['borderEmail'] = "is-invalid";
            $_SESSION['borderPassword'] = "is-invalid";

            header('location: /');
        }
    }else{
        $_SESSION['isNotFill'] = "Please fill the";
        header('location: /');
    }
}
