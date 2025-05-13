<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Education - Modal Form</title>
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
                <h1 class="mt-4">Education</h1>

                <!-- Add Education Button -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#educationModal">
                    Add Education
                </button>

                <!-- Modal -->
                <div class="modal fade" id="educationModal" tabindex="-1" aria-labelledby="educationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="../query/education.query.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="educationModalLabel">Add Education</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                    
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

                                        <select name="attainment" class="form-control p-3 mb-3" id="attainment">
                                            <option value="ELEMENTARY">ELEMENTARY</option>
                                            <option value="HIGH SCHOOL">HIGH SCHOOL</option>
                                            <option value="COLLEGE">COLLEGE</option>
                                            <option value="UNDER GRAD">UNDER GRAD</option>
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="School Name" name="school_name" />
                                        <label for="school_name">School Name</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Description" name="description" />
                                        <label for="description">Description</label>
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
                    $query = "SELECT * FROM `education`"; // Assuming your table name is 'profiles'
                    $result = mysqli_query($conn, $query);
                    ?>

                    <!-- TABLE -->
                    <!-- Profile Table -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Education</h5>
                        </div>
                        <div class="card-body">
                            <table id="profileTable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Educational Attainment</th>
                                        <th>School Name</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Loop through the result and output each row
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Fetch data for each profile
                                            $attainment = $row['attainment'];
                                            $school_name = $row['school_name'];
                                            $description = $row['description'];
                                    ?>
                                        <tr>
                                            <td><?php echo $attainment; ?></td>
                                            <td><?php echo $school_name; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td>
                                            <button class="btn btn-sm btn-info"><img src="\CSELECT04\icons\edit_icon.png" alt="edit" width="18px"></button>
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
</body>
</html>
