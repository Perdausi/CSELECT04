<?php
session_start();
include '../database/connection.php'; // Include database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check the admin user
    $query = "SELECT * FROM admin_tbl WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Check if the password matches
        if ($password == $row['password']) { // Make sure passwords are stored as plain text for this to work
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_username'] = $row['username'];
            header("Location: ../home/resume.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password!'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Admin not found!'); window.location='index.php';</script>";
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
