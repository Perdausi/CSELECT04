<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_id = $_SESSION['admin_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exp_id = $_POST['exp_id'];
    $position = $_POST['position'];
    $company = $_POST['company'];
    $dates = $_POST['dates'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];

    $query = "UPDATE `experience` 
              SET 
                  `admin_id` = '$admin_id',
                  `position` = '$position',
                  `company` = '$company',
                  `dates` = '$dates',
                  `description` = '$description',
                  `salary` = '$salary'
              WHERE `exp_id` = '$exp_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Experience Updated!'); window.location='../dashboard/experience.php';</script>";
    } else {
        echo "<script>alert('Something went Wrong!');</script>";
    }
    
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>










