<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $status = $_POST['status'];
    $citizenship = $_POST['citizenship'];

    $query = "INSERT INTO `profile` (`name`, `address`, `age`, `status`, `citizenship`) VALUES ('$name', '$address', '$age', '$status', '$citizenship')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Check if the password matches
        echo "<script>alert('Profile Submitted!'); window.location='../dashboard/profile.php';</script>";
    } else {
        echo "<script>alert('Something went Wrong!');</script>";
    }
    
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
