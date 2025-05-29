<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$admin_id = $_SESSION['admin_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $certificate = $_POST['certificate'];

    $query = "INSERT INTO certificates (admin_id, certificate) VALUES ('$admin_id', '$certificate')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Certificate Added!'); window.location='../dashboard/certificate.php';</script>";
    } else {
        echo "<script>alert('Something went Wrong!');</script>";
    }
    
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
