<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Admin Dashboard" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include 'side_menu.php'; ?>

        <!-- Page content wrapper -->
        <div id="page-content-wrapper">
            <!-- Top navigation -->
            <?php include "../nav/header.php"; ?>

            <!-- Page content -->
            <div class="container-fluid mt-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-3">Welcome to the Admin Dashboard</h2>
                        <p class="card-text">
                            This dashboard is your control panel. Use the navigation on the left to manage your data.
                        </p>
                        <p class="card-text">
                            You can view your resume using the button below.
                        </p>
                        <a href="../../resume/index.php" class="btn btn-primary">📄 View Resume</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom script -->
    <script src="js/scripts.js"></script>
</body>
</html>
