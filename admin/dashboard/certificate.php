<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Certificates - Modal Form</title>
    <!-- Favicon -->
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
                <h1 class="mt-4">Certificates</h1>

                <!-- Add Certificate Button -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#certificateModal">
                    Add Certificate
                </button>

                <!-- Modal -->
                <div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="../query/certificate.query.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="certificateModalLabel">Add Certificate</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" placeholder="Certificate Name" name="certificate" id="certificateInput" />
                                        <label for="certificateInput">Enter certificate</label>
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
                    $query = "SELECT * FROM `certificates`"; // Assuming your table name is 'profiles'
                    $result = mysqli_query($conn, $query);
                    ?>

                    <!-- TABLE -->
                    <!-- Profile Table -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>List of certificates</h5>
                        </div>
                        <div class="card-body">
                            <table id="profileTable" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Certificate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Loop through the result and output each row
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Fetch data for each profile
                                            $certificate = $row['certificate'];
                                    ?>
                                        <tr>
                                            <td><?php echo $certificate; ?></td>
                                            <!-- <td>
                                                <button class="btn btn-sm btn-info">Edit</button>
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </td> -->
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
