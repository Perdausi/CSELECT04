<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['profile_id']; 
    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];



    // Update query 
    $query = "UPDATE `profile` SET 
        `name` = '$name',
        `address` = '$address',
        `age` = '$age',
        `gender` = '$gender',
        `course` = '$course',
        WHERE `id` = $id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Profile updated successfully!'); window.location='../dashboard/profile.php';</script>";
    } else {
        echo "<script>alert('Error updating profile!');</script>";
    }

} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
