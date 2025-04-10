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
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Start Bootstrap</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="profile.php">My Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="experience.php">Experience</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="education.php">Education</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <button class="btn btn-light" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Education</h1>
                    <form action="../query/education.query.php" method="POST">
                            <div class="form-floating ">
                            
                            <select name="attainment" id="" class="form-control p-3 mb-3" placeholder="Educational attainment level">
                                <option value="ELEMENTARY">ELEMENTARY</option>
                                <option value="HIGH SCHOOL">HIGH SCHOOL</option>
                                <option value="COLLEGE">COLLEGE</option>
                                <option value="UNDER GRAD">UNDER GRAD</option>
                            </select>
                            </div>


                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputAddress" type="text" placeholder="School Name" name="school_name"/>
                            <label for="inputAddress">School Name</label>
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
