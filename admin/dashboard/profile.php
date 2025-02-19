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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Overview</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Profile Management</h1>
                    <form action="../query/profile_query.php" method="POST">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" placeholder="Name" name="name"/>
                            <label for="inputName">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputAddress" type="text" placeholder="Address" name="address"/>
                            <label for="inputAddress">Address</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputAge" type="text" placeholder="Age" name="age"/>
                            <label for="inputAge">Age</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputStatus" type="text" placeholder="Civil Status" name="status"/>
                            <label for="inputStatus">Civil Status</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputCitizenship" type="text" placeholder="Citizenship" name="citizenship"/>
                            <label for="inputCitizenship">Citizenship</label>
                        </div>

                        <button class="btn btn-primary " type="submit">Confirm</button>
                    
                        
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
