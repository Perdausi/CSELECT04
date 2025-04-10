<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $certificate = $_POST['certificate'];

    $query = "INSERT INTO certificates (certificate) VALUES ('$certificate')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Experience Submitted!'); window.location='../dashboard/certificate.php';</script>";
    } else {
        echo "<script>alert('Something went Wrong!');</script>";
    }
    
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
