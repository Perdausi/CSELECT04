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
                    <button class="btn btn-light" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>
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
                                        <select class="form-select" name="name" id="inputName">
                                            <option selected disabled>Select a name</option>
                                            <?php
                                            // Connect to your database
                                            include '../database/connection.php';

                                            // Check connection
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            // Query names from your table
                                            $sql = "SELECT * FROM `profile` ORDER BY `profile`.`name` DESC";
                                            $result = $conn->query($sql);

                                            // Output names as options
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . htmlspecialchars($row["name"]) . '">' . htmlspecialchars($row["name"]) . '</option>';
                                                }
                                            } else {
                                                echo '<option>No names found</option>';
                                            }

                                            $conn->close();
                                            ?>
                                        </select>
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
                            <form action="../query/profile_query.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profileModalLabel">Edit Profile</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                <?php 
                                include '../database/connection.php'; 
                                
                                $query = "SELECT * FROM `profile` ORDER BY `profile_id` DESC LIMIT 1";
                                $res = mysqli_query($conn, $query);
                                $user = mysqli_fetch_assoc($res);
                                ?>

                                    <!-- NAME UPDATE -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Address" name="name" />
                                        <label for="inputAddress"><?php echo $user['name']; ?></label>
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
                                        <input class="form-control" type="text" placeholder="Civil Status" name="status" />
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

                                    <?php
                    // Include your database connection file
                    include '../database/connection.php';

                    // Query the database to fetch the profile data
                    $query = "SELECT * FROM `profile`"; // Assuming your table name is 'profiles'
                    $result = mysqli_query($conn, $query);
                    $count = 1;
                    ?>

                    <!-- TABLE -->
                    <!-- Profile Table -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Profile List</h5>
                        </div>
                        <div class="card-body">
                            <table id="profileTable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
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
                                    // Loop through the result and output each row
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Fetch data for each profile
                                            $name = $row['name'];
                                            $age = $row['age'];
                                            $gender = $row['gender'];
                                            $address = $row['address'];
                                            $course = $row['course'];
                                            $status = $row['status'];
                                    ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $age; ?></td>
                                            <td><?php echo $gender; ?></td>
                                            <td><?php echo $address ?></td>
                                            <td><?php echo $course; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-info"data-bs-toggle="modal" data-bs-target="#UpdateProfileModal"><img src="\CSELECT04\icons\edit_icon.png" alt="edit" width="18px"></button>
                                                <button class="btn btn-sm btn-danger"><img src="\CSELECT04\icons\delete_remove_icon.png" alt="delete" width="18px"></button>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No profiles found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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
