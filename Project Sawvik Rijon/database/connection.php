<?php
session_start();
date_default_timezone_set("Asia/Dhaka");

$host = 'localhost';
$username = 'root';  // Update with your actual username if needed
$password = '';     // Update with your actual password if needed
$database = 'jkkniu_conference';

// Establish connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');

