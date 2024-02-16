<?php
require '../../database/database.php';
require '../../models/user.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape the query string to prevent SQL injection.
    $name = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']); // 123

    // Password encryption
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
  
    $isCreated = createAccount($name, $email, $passwordHash);
    if ($isCreated) {
        header('Location: /login');
    } else {
        header('Location: /signup');
    }
}