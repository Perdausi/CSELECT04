<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['profile_id'];

    // Delete query
    $query = "DELETE FROM `profile` WHERE `profile_id` = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Profile deleted successfully!'); window.location='../dashboard/profile.php';</script>";
    } else {
        echo "<script>alert('Error deleting profile.'); window.location='../dashboard/profile.php';</script>";
    }

} else {
    echo "Invalid request!";
}

mysqli_close($conn);
