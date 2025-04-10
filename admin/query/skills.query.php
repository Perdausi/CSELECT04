<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $skill = $_POST['skill'];

    $query = "INSERT INTO skills (skill) VALUES ('$skill')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Experience Submitted!'); window.location='../dashboard/skills.php';</script>";
    } else {
        echo "<script>alert('Something went Wrong!');</script>";
    }
    
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
