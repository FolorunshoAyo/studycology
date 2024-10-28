<?php
session_start();
include "../utils/util.php";

if (
    isset($_SESSION['username']) &&
    isset($_SESSION['student_id'])
) {
    include "../controller/student/student.php";
    $_id =  $_SESSION['student_id'];
    $student = getById($_id);

    // Util::redirect("Courses.php", "", "");

    $title = "Studycology - Students ";
    include "inc/header.php";
    include "inc/navBar.php";
?>
    <div class="bg-secondary">
        <section class="pt-5 pb-2">
            <div class="container">
                <!-- Home Slider -->
                <div id="myCarousel" class="mx-auto carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../upload/thumbnail/default.png" class="d-block w-100" alt="Los Angeles">
                        </div>

                        <div class="carousel-item">
                            <img src="../upload/thumbnail/default.png" class="d-block w-100" alt="Chicago">
                        </div>

                        <div class="carousel-item">
                            <img src="../upload/thumbnail/default.png" class="d-block w-100" alt="New York">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- End Home Slider -->
                <!-- Drill Section -->
                <div class="drill my-4">
                    <div class="header-pill w-75 mx-auto bg-primary text-center rounded-pill text-white fs-4">
                        Drill
                    </div>
                    <div class="mt-2 row gx-2">
                        <div class="col-4">
                            <a href="#" class="home-card card bg-white shadow-sm text-center">
                                <div class="card-header bg-transparent border-none pb-0">
                                    <img src="../assets/img/Logo.png" width="50" height="50">
                                </div>
                                <div class="card-body">
                                    <p class="fw-bold card-text">CBT Test</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="home-card card bg-white shadow-sm text-center">
                                <div class="card-header bg-transparent border-none pb-0">
                                    <img src="../assets/img/Logo.png" width="50" height="50">
                                </div>
                                <div class="card-body">
                                    <p class="fw-bold card-text">Assignment</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="home-card card bg-white shadow-sm text-center">
                                <div class="card-header bg-transparent border-none pb-0">
                                    <img src="../assets/img/Logo.png" width="50" height="50">
                                </div>
                                <div class="card-body">
                                    <p class="fw-bold card-text">Exam</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Drill Section -->
                <!-- Study Materials -->
                <div class="study-materials my-4">
                    <div class="header-pill w-75 mx-auto bg-primary text-center rounded-pill text-white fs-4">
                        Study Materials
                    </div>
                    <div class="mt-2 row gx-2">
                        <div class="col-4">
                            <a href="#" class="home-card card bg-white shadow-sm text-center">
                                <div class="card-header bg-transparent border-none pb-0">
                                    <img src="../assets/img/Logo.png" width="50" height="50">
                                </div>
                                <div class="card-body">
                                    <p class="fw-bold card-text">Notes</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="home-card card bg-white shadow-sm text-center">
                                <div class="card-header bg-transparent border-none pb-0">
                                    <img src="../assets/img/Logo.png" width="50" height="50">
                                </div>
                                <div class="card-body">
                                    <p class="fw-bold card-text">Videos</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="home-card card bg-white shadow-sm text-center">
                                <div class="card-header bg-transparent border-none pb-0">
                                    <img src="../assets/img/Logo.png" width="50" height="50">
                                </div>
                                <div class="card-body">
                                    <p class="fw-bold card-text">Books</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="mt-2 row gx-2">
                        <div class="col-4">
                            <a href="#" class="home-card card bg-white shadow-sm text-center">
                                <div class="card-header bg-transparent border-none pb-0">
                                    <img src="../assets/img/Logo.png" width="50" height="50">
                                </div>
                                <div class="card-body">
                                    <p class="fw-bold card-text">Syllabus</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="home-card card bg-white shadow-sm text-center">
                                <div class="card-header bg-transparent border-none pb-0">
                                    <img src="../assets/img/Logo.png" width="50" height="50">
                                </div>
                                <div class="card-body">
                                    <p class="fw-bold card-text">Games</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="home-card card bg-white shadow-sm text-center">
                                <div class="card-header bg-transparent border-none pb-0">
                                    <img src="../assets/img/Logo.png" width="50" height="50">
                                </div>
                                <div class="card-body">
                                    <p class="fw-bold card-text">Life Changer</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Drill Section -->
            </div>
        </section>
        <section class="news-section bg-white">
            <div class="container py-2">
                <h2 class="mb-2">News</h2>
                <div class="news-group">
                    <div class="news mb-3 d-flex align-items-center">
                        <div class="news-image me-3" style="background-image: url('../assets/img/bg2.jpg')">
                        </div>
                        <div class="news-caption">
                            <h3 class="mb-2">News Topic #1</h3>
                            <a href="#">read more</a>
                        </div>
                    </div>
                    <div class="news mb-3 d-flex align-items-center">
                        <div class="news-image me-3" style="background-image: url('../assets/img/bg2.jpg')">
                        </div>
                        <div class="news-caption">
                            <h3 class="mb-2">News Topic #1</h3>
                            <a href="#">read more</a>
                        </div>
                    </div>
                    <div class="news mb-3 d-flex align-items-center">
                        <div class="news-image me-3" style="background-image: url('../assets/img/bg2.jpg')">
                        </div>
                        <div class="news-caption">
                            <h3 class="mb-2">News Topic #1</h3>
                            <a href="#">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <?php include "inc/footer.php"; ?>
<?php
} else {
    $em = "You need to login to access your dashboard";
    Util::redirect("../login.php", "error", $em);
}
?>