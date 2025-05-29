<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_id = $_SESSION['admin_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $profile_id = $_POST['profile_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $description = $_POST['description'] ?? '';
    $status = $_POST['status'];
    $isActive = $_POST['isActive'] ?? '1';
    $citizenship = $_POST['citizenship'] ?? '';
    
    // $profile_picture_sql = ""; // default, if no new picture is uploaded

    // // if (!empty($_FILES['profile_picture']['name'])) {
    // //     $upload_dir = "../uploads/";
    // //     $file_name = time() . "_" . basename($_FILES['profile_picture']['name']);
    // //     $target_path = $upload_dir . $file_name;

    // //     if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_path)) {
    // //         $profile_picture_sql = ", profile_picture = '$target_path'";
    // //     } else {
    // //         echo "<script>alert('Error uploading file.'); window.location='../dashboard/profile.php';</script>";
    // //         exit();
    // //     }
    // // }

    $query = "UPDATE `profile` 
              SET 
                  `admin_id` = '$admin_id',
                  `name` = '$name',
                  `address` = '$address',
                  `age` = '$age',
                  `gender` = '$gender',
                  `course` = '$course',
                  `description` = '$description',
                  `status` = '$status',
                  `isActive` = '$isActive',
                  `citizenship` = '$citizenship'
                --   $profile_picture_sql
              WHERE `profile_id` = '$profile_id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Profile Updated!'); window.location='../dashboard/profile.php';</script>";
    } else {
        echo "<script>alert('Update failed!'); window.location='../dashboard/profile.php';</script>";
    }

} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
