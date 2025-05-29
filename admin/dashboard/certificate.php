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
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Education - Modal Example</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php include 'side_menu.php'; ?>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <button class="btn btn-light" id="sidebarToggle"><span></span></button>
                    <a href="../query/logout.query.php" class="btn btn-danger p-2">Logout</a>
                </div>
            </nav>

            <div class="container-fluid">
                <h1 class="mt-4">Certificates</h1>

                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#educationModal">
                    Add Certificates
                </button>

                <!-- Add Education Modal -->
                <div class="modal fade" id="educationModal" tabindex="-1" aria-labelledby="educationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="../query/certificate.query.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="educationModalLabel">Add your Certificates</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="certificate" placeholder="Certificate" required />
                                        <label>Certificates</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                include '../database/connection.php';
                $admin_id = $_SESSION['admin_id'];
                $query = "SELECT * FROM certificates WHERE admin_id = '$admin_id' ORDER BY cert_id DESC";
                $result = mysqli_query($conn, $query);
                ?>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Certificates</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Certificates</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $cert_id = $row['cert_id'];
                                ?>
                                <tr>
                                    <td><?php echo $row['certificate']; ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editModal_<?php echo $cert_id; ?>">
                                            <img src="/CSELECT04/icons/edit_icon.png" alt="edit" width="18px">
                                        </button>
                                        <form action="../query/delete.education.php" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this education record?');">
                                            <input type="hidden" name="certificate" value="<?php echo $cert_id; ?>">
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <img src="/CSELECT04/icons/delete_remove_icon.png" alt="delete" width="18px">
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal_<?php echo $cert_id; ?>" tabindex="-1" aria-labelledby="editModalLabel_<?php echo $cert_id; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="../query/certificate.update.php" method="POST">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel_<?php echo $cert_id; ?>">Edit Education</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="cert_id" value="<?php echo $cert_id; ?>">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" type="text" name="certificate" value="<?php echo $row['certificate']; ?>" required />
                                                        <label>School Name</label>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No education records found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>