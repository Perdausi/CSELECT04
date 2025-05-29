<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$admin_id = $_SESSION['admin_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $skill = $_POST['skills'];

    $query = "INSERT INTO skills (`admin_id`,`skill`) VALUES ('$admin_id', '$skill')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Skill Submitted!'); window.location='../dashboard/skills.php';</script>";
    } else {
        echo "<script>alert('Something went Wrong!');</script>";
    }
    
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>

