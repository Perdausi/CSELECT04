<?php 
    include '../admin/database/connection.php';

    $query = "SELECT * FROM `profile` ORDER BY `profile_id` DESC LIMIT 1";
    $res = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($res);
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


    $query = "SELECT * FROM `experience` ORDER BY `exp_id` DESC LIMIT 1";
    $res = mysqli_query($conn, $query);
    $exp = mysqli_fetch_assoc($res);
    ?>
            <!-- Experience -->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>
                    <?php
                    // Assuming you already ran a query like:
                    $result = mysqli_query($conn, "SELECT * FROM experience");
                    while ($exp = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                            <div class="flex-grow-1">
                                <h3 class="mb-0"><?php echo $exp['position']; ?></h3>
                                <div class="subheading mb-3"><?php echo $exp['company']; ?></div>
                                <p><?php echo $exp['description']; ?></p>
                            </div>
                            <div class="flex-shrink-0"><span class="text-primary"><?php echo $exp['dates']; ?></span></div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </section>



            <hr class="m-0" />
            <!-- Education-->
            <section class="resume-section" id="education">
                <div class="resume-section-content">
                    <h2 class="mb-5">Education</h2>
                    <?php
                    // Assuming you already ran a query like:
                    $result = mysqli_query($conn, "SELECT * FROM education");
                    while ($exp = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?php echo $exp['attainment']; ?></h3>
                            <div class="subheading mb-3"><?php echo $exp['school_name']; ?></div>
                            <div><?php echo $exp['description']; ?></div>
                            <p>GPA: 3.23</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">August 2006 - May 2010</span></div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </section>



            <hr class="m-0" />



            <!-- Skills-->
            <section class="resume-section" id="skills">
                <div class="resume-section-content">
                    <h2 class="mb-5">Skills</h2>
                    <div class="subheading mb-3">Languages</div>
                    <?php
                    // Assuming you already ran a query like:
                    $result = mysqli_query($conn, "SELECT * FROM skills");
                    while ($exp = mysqli_fetch_assoc($result)) {
                    ?>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            <?php echo $exp['skill']; ?>
                        </li>
                    </ul>
                    <?php
                    }
                    ?>
                </div> 
            </section>
            <hr class="m-0" />


            <!-- awards-->
            <section class="resume-section" id="awards">
            <div class="resume-section-content">
                    <h2 class="mb-5">List of Awards</h2>
                    <?php
                    // Assuming you already ran a query like:
                    $result = mysqli_query($conn, "SELECT * FROM awards");
                    while ($exp = mysqli_fetch_assoc($result)) {
                    ?>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            <?php echo $exp['award']; ?>
                        </li>        
                    </ul>
                    <?php
                    }
                    ?>
                </div>
            </section>
            <hr class="m-0" />
            <!-- certificates-->
            <section class="resume-section" id="certifications">
            <div class="resume-section-content">
                    <h2 class="mb-5">List of Certidicates</h2>
                    <?php
                    // Assuming you already ran a query like:
                    $result = mysqli_query($conn, "SELECT * FROM certificates");
                    while ($exp = mysqli_fetch_assoc($result)) {
                    ?>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            <?php echo $exp['certificate']; ?>
                        </li>        
                    </ul>
                    <?php
                    }
                    ?>
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
