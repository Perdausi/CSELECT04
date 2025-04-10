<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simple Sidebar - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <?php include 'side_menu.php'; ?>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <button class="btn btn-light" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Experience</h1>
                    <form action="../query/experience_query.php" method="POST">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" placeholder="Name" name="position"/>
                            <label for="inputName">Position</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputAddress" type="text" placeholder="Address" name="company"/>
                            <label for="inputAddress">Company</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputAge" type="date" placeholder="Age" name="dates"/>
                            <label for="inputAge">Date Hired</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputAge" type="text" placeholder="Age" name="description"/>
                            <label for="inputAge">Description</label>
                        </div>
                        <button class="btn btn-primary " type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
