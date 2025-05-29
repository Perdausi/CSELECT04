<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../index.php");
    exit();
}

$admin_id = $_SESSION['admin_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $educ_id = ($_POST['educ_id']);
    $attainment = ($_POST['attainment']);
    $school_name = ($_POST['school_name']);
    $description = ($_POST['description']);

    $query = "UPDATE `education` 
              SET 
                  `admin_id` = '$admin_id',
                  `attainment` = '$attainment',
                  `school_name` = '$school_name',
                  `description` = '$description'
              WHERE `educ_id` = '$educ_id'";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Education Updated!'); window.location='../dashboard/education.php';</script>";
    } else {
        echo "<script>alert('Something went Wrong!');</script>";
    }
    
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
