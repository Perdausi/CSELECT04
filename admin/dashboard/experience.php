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
    <title>Experience - Modal Example</title>
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
                <h1 class="mt-4">Experience</h1>

                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#experienceModal">
                    Add Experience
                </button>

                <!-- Add Experience Modal -->
                <div class="modal fade" id="experienceModal" tabindex="-1" aria-labelledby="experienceModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="../query/experience_query.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="experienceModalLabel">Add Experience</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Position" name="position" required />
                                        <label>Position</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Company" name="company" required />
                                        <label>Company</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="date" name="dates" required />
                                        <label>Date Hired</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Description" name="description" required />
                                        <label>Description</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Salary" name="salary" required />
                                        <label>Salary</label>
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
                $query = "SELECT * FROM `experience` WHERE admin_id = '$admin_id' ORDER BY `exp_id` DESC";
                $result = mysqli_query($conn, $query);
                ?>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Experiences</h5>
                    </div>
                    <div class="card-body">
                        <table id="profileTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Company</th>
                                    <th>Date Hired</th>
                                    <th>Salary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $exp_id = $row['exp_id'];
                                ?>
                                <tr>
                                    <td><?php echo $row['position']; ?></td>
                                    <td><?php echo $row['company']; ?></td>
                                    <td><?php echo $row['dates']; ?></td>
                                    <td><?php echo $row['salary']; ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editModal_<?php echo $exp_id; ?>">
                                            <img src="/CSELECT04/icons/edit_icon.png" alt="edit" width="18px">
                                        </button>
                                        <form action="../query/delete.experience.php" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this experience?');">
                                            <input type="hidden" name="exp_id" value="<?php echo $row['exp_id']; ?>">
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <img src="\CSELECT04\icons\delete_remove_icon.png" alt="delete" width="18px">
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal_<?php echo $exp_id; ?>" tabindex="-1" aria-labelledby="editModalLabel_<?php echo $exp_id; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="../query/experience.update.php" method="POST">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel_<?php echo $exp_id; ?>">Edit Experience</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="exp_id" value="<?php echo $exp_id; ?>">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" type="text" name="position" value="<?php echo $row['position']; ?>" />
                                                        <label>Position</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" type="text" name="company" value="<?php echo $row['company']; ?>" />
                                                        <label>Company</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" type="date" name="dates" value="<?php echo $row['dates']; ?>" />
                                                        <label>Date Hired</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" type="text" name="description" value="<?php echo $row['description']; ?>" />
                                                        <label>Description</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" type="text" name="salary" value="<?php echo $row['salary']; ?>" />
                                                        <label>Salary</label>
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
                                    echo "<tr><td colspan='5'>No experiences found</td></tr>";
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
