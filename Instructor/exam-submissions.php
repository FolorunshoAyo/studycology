<?php 
session_start();
include "../utils/util.php";

if (
    isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])
) {
    include "../controller/instructor/instructor.php";
    $_id =  $_SESSION['instructor_id'];
    $instructor = getById($_id);

    $title = "Studycology - Instructors (View All Added CBT Questions)";
    include "inc/header.php";
    include "inc/navbar.php";
?>  
    <div class="container mt-4 mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-0">Mathematics Assignment: Algebra and Functions - Submissions</h4>
            </div>
        </div>
        <div class="list-table">
            <div class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                <h4 class="mb-0">Submissions</h4>
                <form action="./cbt-view.php" class="row gx-1 gy-2 align-items-center mt-2 mt-sm-0">
                    <div class="col-12">
                        <div class="input-group my-2 my-sm-0">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>#Id</th>
                        <th>Student</th>
                        <th>Marks</th>
                        <th>Date Submitted</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            Shodiya Folorunsho Ayomide 
                        </td>
                        <td>
                            <b>Objective:</b> <span class="text-success">50</span> marks<br>
                            <b>Theory:</b> To be scored<br>
                            <b>Total:</b> <span class="text-success">50/100</span> marks
                        </td>
                        <td>10th, September, 2024 12:30pm</td>
                        <td>
                            <a href="assignment-submission-view.php" class="btn btn-success">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="empty-table pt-5 mb-5">
            <h4>Submissions</h4>

            <div class="border rounded d-flex align-items-center justify-content-center p-5">
                <div class="empty-container d-flex flex-column text-center">
                    <i class="fa fa-frown-o mb-2 fs-1"></i>
                    <p class="mb-2">No Assignments Submissions to display yet.</p>
                    <!-- <a href="#">Create New Assignment</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include "inc/footer.php"; ?>
<?php
}else{
  $em = "You need to login to access your page";
  Util::redirect("../login.php", "error", $em);
}
?>