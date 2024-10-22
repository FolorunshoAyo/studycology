<?php 
session_start();
include "../Utils/Util.php";

if (isset($_SESSION['username']) &&
    isset($_SESSION['student_id'])) {
    include "../Controller/Student/Student.php";
    $_id =  $_SESSION['student_id'];
    $student = getById($_id);

    // Util::redirect("Courses.php", "", "");

    $title = "EduPulse - Students ";
    include "inc/Header.php";
    include "inc/NavBar.php";
 ?>
<div class="wrapper">
    <section class="container">
        <!-- NavBar -->
    </section>
</div>
<!-- Footer -->
<?php include "inc/Footer.php"; ?>
<?php
 }else { 
$em = "You need to login to access your dashboard";
Util::redirect("../login.php", "error", $em);
} 
?>