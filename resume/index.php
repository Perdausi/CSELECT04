<?php 
    include '../admin/database/connection.php';

    session_start();

        if (!isset($_SESSION['admin_id'])) {
            header("Location: ../admin/index.php"); // Redirect to login page if not logged in
            exit();
        }

    // $query = "SELECT * FROM `profile` ORDER BY `profile_id` DESC LIMIT 1";
    // $res = mysqli_query($conn, $query);
    // $user = mysqli_fetch_assoc($res);


    $admin_id = $_SESSION['admin_id'];
    $count = 1;

    $query = "SELECT * FROM `profile` WHERE admin_id = '$admin_id' ORDER BY `profile_id` DESC";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resume - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Clarence Taylor</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="../admin/uploads/<?php echo $user['profile_picture']; ?>" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>   
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#certifications">Certifications</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        <?php echo $user['name']; ?>
                    </h1>
                    <div class="subheading mb-5">
                        <?php echo $user['address']; ?> · (317) 585-8468 ·
                        <a href="mailto:name@email.com">name@email.com</a>
                    </div>
                    <p><?php echo $user['description']; ?></p>
                    <div class="social-icons">
                        <a class="social-icon" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="https://www.facebook.com/OfficialDanielPadilla/"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </section>
            <hr class="m-0" />

            <?php 
                $admin_id = $_SESSION['admin_id'];
                $query = "SELECT * FROM `experience` WHERE admin_id = '$admin_id' ORDER BY `exp_id` DESC";
                $result = mysqli_query($conn, $query);
                ?>

                <!-- Experience -->
                <section class="resume-section" id="experience">
                    <div class="resume-section-content">
                        <h2 class="mb-5">Experience</h2>
                        <?php while ($exp = mysqli_fetch_assoc($result)) { ?>
                            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                                <div class="flex-grow-1">
                                    <h3 class="mb-0"><?php echo $exp['position']; ?></h3>
                                    <div class="subheading mb-3"><?php echo $exp['company']; ?></div>
                                    <p><?php echo $exp['description']; ?></p>
                                </div>
                                <div class="flex-shrink-0"><span class="text-primary"><?php echo $exp['dates']; ?></span></div>
                            </div>
                        <?php } ?>
                    </div>
                </section>




            <hr class="m-0" />
            <!-- Education-->
           <?php
                $admin_id = $_SESSION['admin_id'];
                $query = "SELECT * FROM `education` WHERE admin_id = '$admin_id' ORDER BY `educ_id` DESC";
                $result = mysqli_query($conn, $query);
                ?>

                <section class="resume-section" id="education">
                    <div class="resume-section-content">
                        <h2 class="mb-5">Education</h2>
                        <?php while ($edu = mysqli_fetch_assoc($result)) { ?>
                            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                                <div class="flex-grow-1">
                                    <h3 class="mb-0"><?php echo $edu['attainment']; ?></h3>
                                    <div class="subheading mb-3"><?php echo $edu['school_name']; ?></div>
                                    <div><?php echo $edu['description']; ?></div>
                                    <!-- Optional GPA or other fields -->
                                    <!-- <p>GPA: </p> -->
                                </div>
                                <!-- Optional: Add date range if available in DB -->
                                <!-- <div class="flex-shrink-0"><span class="text-primary"><?php echo $edu['dates']; ?></span></div> -->
                            </div>
                        <?php } ?>
                    </div>
                </section>




            <hr class="m-0" />



            <!-- Skills-->
            <?php
                $admin_id = $_SESSION['admin_id'];
                $query = "SELECT * FROM `skills` WHERE admin_id = '$admin_id' ORDER BY skill_id DESC";
                $result = mysqli_query($conn, $query);
                ?>

                <section class="resume-section" id="skills">
                    <div class="resume-section-content">
                        <h2 class="mb-5">Skills</h2>
                        <div class="subheading mb-3">Languages</div>
                        <ul class="fa-ul mb-0">
                            <?php while ($skill = mysqli_fetch_assoc($result)) { ?>
                                <li>
                                    <span class="fa-li"><i class="fas fa-check"></i></span>
                                    <?php echo $skill['skill']; ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </section>

            <hr class="m-0" />


            <!-- awards-->
            <?php
                $admin_id = $_SESSION['admin_id'];
                $query = "SELECT * FROM `awards` WHERE admin_id = '$admin_id' ORDER BY award_id DESC";
                $result = mysqli_query($conn, $query);
                ?>

                <section class="resume-section" id="awards">
                    <div class="resume-section-content">
                        <h2 class="mb-5">List of Awards</h2>
                        <ul class="fa-ul mb-0">
                            <?php while ($award = mysqli_fetch_assoc($result)) { ?>
                                <li>
                                    <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php echo $award['award']; ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </section>

            <hr class="m-0" />
            <!-- certificates-->
           <?php
                $admin_id = $_SESSION['admin_id'];
                $query = "SELECT * FROM `certificates` WHERE admin_id = '$admin_id' ORDER BY cert_id DESC";
                $result = mysqli_query($conn, $query);
                ?>

                <section class="resume-section" id="certifications">
                    <div class="resume-section-content">
                        <h2 class="mb-5">List of Certificates</h2>
                        <ul class="fa-ul mb-0">
                            <?php while ($cert = mysqli_fetch_assoc($result)) { ?>
                                <li>
                                    <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                                    <?php echo $cert['certificate']; ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </section>

        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
