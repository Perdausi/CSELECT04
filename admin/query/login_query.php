<?php
session_start();
include '../database/connection.php'; // Include database connection

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Query to check the admin user
    $query = "SELECT * FROM admin_tbl WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Check if the password matches (plain text)
        if ($password === $row['password']) {
            // Store user data in session
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_username'] = $row['username'];

            // Redirect to dashboard
            header("Location: ../dashboard/dashboard.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password!'); window.location='../index.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Admin not found!'); window.location='../index.php';</script>";
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}

mysqli_close($conn);
