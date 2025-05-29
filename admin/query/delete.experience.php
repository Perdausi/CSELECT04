<?php
session_start();
include '../database/connection.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $exp_id = $_POST['exp_id'];
    $admin_id = $_SESSION['admin_id'];

    // Make sure the experience belongs to the logged-in admin
    $query = "DELETE FROM experience WHERE exp_id = ? AND admin_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $exp_id, $admin_id);

    if ($stmt->execute()) {
        header("Location: ../dashboard/experience.php");
    } else {
        header("Location: ../admin/experience.php?delete=error");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../admin/experience.php");
    exit();
}
?>
