<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_id = $_SESSION['admin_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $award = $_POST['award'];

    $query = "INSERT INTO awards (admin_id, award) VALUES ('$admin_id', '$award')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Awards Submitted!'); window.location='../dashboard/awards.php';</script>";
    } else {
        echo "<script>alert('Something went Wrong!');</script>";
    }
    
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
