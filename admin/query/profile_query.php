<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_id = $_SESSION['admin_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $isActive = $_POST['isActive'];
    $citizenship = $_POST['citizenship'];

    if (!empty($_FILES['profile_picture']['name'])) {
        $upload_dir = "../uploads/"; 
        $file_name = time() . "_" . basename($_FILES['profile_picture']['name']); 
        $target_path = $upload_dir . $file_name;

        if (!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_path)) {
            echo "<script>alert('Error uploading file.'); window.location='../dashboard/profile.php';</script>";
            exit();
        }
    } else {
        $target_path = null; 
    }

    // Check if a profile already exists for this admin
    $check_query = "SELECT * FROM `profile` WHERE `admin_id` = '$admin_id' LIMIT 1";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Profile exists, do not insert again
        echo "<script>alert('You already have a profile! Please update it instead.'); window.location='../dashboard/profile.php';</script>";
        exit();
    }

    // Insert new profile because none exists yet
    $query = "INSERT INTO `profile` (`admin_id`, `name`, `address`, `age`, `gender`, `course`, `description`, `status`, `isActive`, `citizenship`, `profile_picture`) 
              VALUES ('$admin_id', '$name', '$address', '$age', '$gender', '$course', '$description', '$status', '$isActive', '$citizenship', '$target_path')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Profile Submitted!'); window.location='../dashboard/profile.php';</script>";
    } else {
        echo "<script>alert('Something went wrong!'); window.location='../dashboard/profile.php';</script>";
    }

} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
