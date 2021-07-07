<?php

$host = 'localhost';
$user = 'root';
$pass = 'y26370131';
$db_name ='blog';

$conn = new MYSQli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
} else {
    echo "DB connection successful!";
}