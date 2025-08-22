<?php

$hostname = "localhost";
$database = "pos";
$username = "root";
$password = "@My#db2025!";

$dsn = "mysql:host=$hostname;dbname=$database;charset=utf8mb4";
$connection = new PDO($dsn, $username, $password);
