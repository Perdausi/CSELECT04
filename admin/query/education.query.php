<?php
session_start();
include '../database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$admin_id = $_SESSION['admin_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $attainment_lvl = $_POST['attainment'];
    $school_name = $_POST['school_name'];
    $description = $_POST['description'];

    $query = "INSERT INTO `education` (`admin_id`,`attainment`, `school_name`, `description`) VALUES ('$admin_id','$attainment_lvl', '$school_name', '$description');";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Experience Submitted!'); window.location='../dashboard/education.php';</script>";
    } else {
        echo "<script>alert('Something went Wrong!');</script>";
    }
    
} else {
    echo "Invalid request!";
}
mysqli_close($conn);
?>
