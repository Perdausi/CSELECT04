<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Experience - Modal Example</title>
        <!-- Favicon-->
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
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <button class="btn btn-light" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>
                    </div>
                </nav>

                <!-- Page content -->
                <div class="container-fluid">
                    <h1 class="mt-4">Experience</h1>

                    <!-- Add Experience Button -->
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#experienceModal">
                        Add Experience
                    </button>

                    <!-- Modal -->
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
                                            <label for="inputPosition">Position</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputCompany" type="text" placeholder="Company" name="company" required />
                                            <label for="inputCompany">Company</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputDate" type="date" name="dates" required />
                                            <label for="inputDate">Date Hired</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputDescription" type="text" placeholder="Description" name="description" required />
                                            <label for="inputDescription">Description</label>
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
                    $query = "SELECT * FROM `experience`"; // Assuming your table name is 'profiles'
                    $result = mysqli_query($conn, $query);
                    ?>

                    <!-- TABLE -->
                    <!-- Profile Table -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Experiences</h5>
                        </div>
                        <div class="card-body">
                            <table id="profileTable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>Company</th>
                                        <th>Date Hired</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Loop through the result and output each row
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Fetch data for each profile
                                            $position = $row['position'];
                                            $company = $row['company'];
                                            $dates = $row['dates'];
                                            $description = $row['description'];
                                    ?>
                                        <tr>
                                            <td><?php echo $position; ?></td>
                                            <td><?php echo $company; ?></td>
                                            <td><?php echo $dates; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-info">Edit</button>
                                                <button class="btn btn-sm btn-danger">Delete</button>
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

        <!-- Bootstrap Bundle JS (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Custom script -->
        <script src="js/scripts.js"></script>
    </body>
</html>
