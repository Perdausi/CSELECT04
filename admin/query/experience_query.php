<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $position = $_POST['position'];
    $company = $_POST['company'];
    $dates = $_POST['dates'];
    $description = $_POST['description'];

    $query = "INSERT INTO experience (position, company, dates, description) VALUES ('$position','$company','$dates','$description')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Experience Submitted!'); window.location='../dashboard/profile.php';</script>";
    } else {
        echo "<script>alert('Something went Wrong!');</script>";
    }
    
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
