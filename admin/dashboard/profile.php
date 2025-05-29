<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../index.php"); // Redirect to login page if not logged in
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
    <title>Profile Management - Modal Form</title>
    <!-- Add this inside the <head> section -->
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- ABOVE LINK IS FOR THE TABLE ALSO THE SCRIPT AT THE BOTTOM -->

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include 'side_menu.php'; ?>

        <!-- Page content wrapper -->
        <div id="page-content-wrapper">
            <!-- Top navigation -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <button class="btn btn-light" id="sidebarToggle"><span></span></button>
                    <a href="../query/logout.query.php" class="btn btn-danger p-2">Logout</a>
                </div>
            </nav>

            <!-- Page content -->
            <div class="container-fluid">
                <h1 class="mt-4">Profile Management</h1>

                <!-- Edit Profile Button -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#profileModal">
                    Add Profile
                </button>

                <!-- Modal -->
                <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="../query/profile_query.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profileModalLabel">Edit Profile</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <!-- NAME UPDATE -->


                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Address" name="name" />
                                        <label for="inputName">Name</label>
                                    </div>


                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Address" name="address" />
                                        <label for="inputAddress">Address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Age" name="age" />
                                        <label for="inputAge">Age</label>
                                    </div>

                                    <select name="gender" class="form-control p-3 mb-3">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>

                                    <select name="course" class="form-control p-3 mb-3">
                                        <option value="BSCS">BSCS</option>
                                        <option value="BSIT">BSIT</option>
                                        <option value="BSTB">BSTB</option>
                                        <option value="UNDER GRAD">UNDER GRAD</option>
                                    </select>

                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Description" name="description" style="height: 100px;"></textarea>
                                        <label for="inputCourse">Description</label>
                                    </div>

                                    <select name="isActive" class="form-control p-3 mb-3">
                                        <option value="active">Active</option>
                                        <option value="inActive">Inactive</option>
                                    </select>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Civil Status" name="status" />
                                        <label for="inputStatus">Civil Status</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Citizenship" name="citizenship" />
                                        <label for="inputCitizenship">Citizenship</label>
                                    </div>

                                    <div class="mb-3">
                                        <input class="form-control p-3" type="file" name="profile_picture" accept="image/*" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>





                <!-- UPDATE MODAL -->
                <div class="modal fade" id="UpdateProfileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="../query/profile.update.query.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profileModalLabel">Edit Profile</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                 <?php 
                                    include '../database/connection.php'; 
                                    $admin_id = $_SESSION['admin_id'];
                                    $count = 1;

                                    $query = "SELECT * FROM `profile` WHERE admin_id = '$admin_id' ORDER BY `profile_id` DESC";
                                    $result = mysqli_query($conn, $query);
                                    $user = mysqli_fetch_assoc($result);
                                    ?>

                                    <!-- NAME UPDATE -->
                                     <input type="hidden" name="profile_id" value="<?php echo $user['profile_id']; ?>">

                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="name" value="<?php echo ($user['name']); ?>"/>
                                        <label for="inputAge">Full Name</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Description" name="description" style="height: 100px;"><?php echo ($user['description']); ?></textarea>
                                        <label for="inputAge">Description</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Address" name="address" value="<?php echo ($user['address']); ?>"/>
                                        <label for="inputAge">Address</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Age" name="age" value="<?php echo ($user['age']); ?>"/>
                                        <label for="inputAge">Age</label>
                                    </div>

                                    <div class="form-floating">
                                        <select name="gender" class="form-control  mb-3">
                                            <option value="Male" <?php echo ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?php echo ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                        </select>
                                        <label for="inputAge">Gender</label>
                                    </div>

                                    <!-- COURSE SELECT -->
                                    <div class="form-floating">
                                        <select name="course" class="form-control mb-3">
                                            <option value="BSCS" <?php echo ($user['course'] == 'BSCS') ? 'selected' : ''; ?>>BSCS</option>
                                            <option value="BSIT" <?php echo ($user['course'] == 'BSIT') ? 'selected' : ''; ?>>BSIT</option>
                                            <option value="BSTB" <?php echo ($user['course'] == 'BSTB') ? 'selected' : ''; ?>>BSTB</option>
                                            <option value="UNDER GRAD" <?php echo ($user['course'] == 'UNDER GRAD') ? 'selected' : ''; ?>>UNDER GRAD</option>
                                        </select>
                                        <label for="inputAge">Course</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Civil Status" name="status" value="<?php echo ($user['status']); ?>"/>
                                        <label for="inputStatus">Civil Status</label>
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
<!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->
                   <?php 
                        include '../database/connection.php'; 
                        $admin_id = $_SESSION['admin_id'];
                        $count = 1;

                        $query = "SELECT * FROM `profile` WHERE admin_id = '$admin_id' ORDER BY `profile_id` DESC";
                        $result = mysqli_query($conn, $query);
                        ?>

                        <!-- Profile Table -->
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>Course</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($result) > 0) {
                                               
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                                        <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="<?php echo htmlspecialchars($row['description']); ?>">
                                                            <?php echo htmlspecialchars($row['description']); ?>
                                                        </td>
                                                        <td><?php echo htmlspecialchars($row['age']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['address']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['course']); ?></td>
                                                        <td>
                                                            <span class="badge bg-<?php echo $row['status'] === 'Active' ? 'success' : 'secondary'; ?>">
                                                                <?php echo htmlspecialchars($row['status']); ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <!-- Update Button -->
                                                            <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#UpdateProfileModal" title="Edit">
                                                                <img src="/CSELECT04/icons/edit_icon.png" alt="edit" width="18px">
                                                            </button>
                                                            <!-- Delete Button -->
                                                            <form action="../query/delete.profile.query.php" method="POST" class="d-inline"
                                                                onsubmit="return confirm('Are you sure you want to delete this profile?');">
                                                                <input type="hidden" name="profile_id" value="<?php echo $row['profile_id']; ?>">
                                                                <button class="btn btn-sm btn-danger" type="submit" title="Delete">
                                                                    <img src="/CSELECT04/icons/delete_remove_icon.png" alt="delete" width="18px">
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='9' class='text-center text-muted'>No profiles found</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>


    <!-- TABLE SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#profileTable').DataTable();
    });
</script>
</body>
</html>
