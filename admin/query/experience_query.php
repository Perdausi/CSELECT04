<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_id = $_SESSION['admin_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $position = $_POST['position'];
    $company = $_POST['company'];
    $dates = $_POST['dates'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];

    $query = "INSERT INTO experience (admin_id, position, company, dates, description, salary) VALUES ('$admin_id', '$position','$company','$dates','$description','$salary')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Experience Submitted!'); window.location='../dashboard/experience.php';</script>";
    } else {
        echo "<script>alert('Something went Wrong!');</script>";
    }
    
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
