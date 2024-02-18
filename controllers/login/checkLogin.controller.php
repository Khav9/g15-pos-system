<?php
session_start();
require_once '../../database/database.php';
require_once '../../models/user.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) and !empty($_POST['email'])) {
        // Escape the query string to prevent SQL injection.
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']); //123

        // Get data from database
        $user = getUser($email);
        // Check if user exists
        if (count($user) > 0) {
            // Check if password is correct
            if (password_verify($password, $user[3])) {
                $_SESSION['user'] = $user;
                $_SESSION['success'] = "Login successful";
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
