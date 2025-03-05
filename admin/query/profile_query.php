<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
        $file_name = time() . "_" . $_FILES['profile_picture']['name']; 
        $target_path = $upload_dir . $file_name;

        
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_path)) {
            echo "File uploaded successfully!";
        } else {
            echo "Error uploading file.";
        }
    } else {
        $target_path = null; 
    }

    $query = "INSERT INTO `profile` (`name`, `address`, `age`, `gender`, `course`, `description`, `status`, `isActive`, `citizenship`, `profile_picture`) VALUES ('$name', '$address', '$age', '$gender', '$course', '$description', '$status', '$isActive', '$citizenship', '$target_path')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Profile Submitted!'); window.location='../dashboard/profile.php';</script>";
    } else {
        echo "<script>alert('Something went Wrong!');</script>";
    }
    
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
