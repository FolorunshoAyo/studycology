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
    <div class="container mt-4">
        <div class="list-table pt-5">
            <div class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                <h4 class="mb-0">All added Exams</h4>
                <form action="./cbt-view.php" class="row gx-1 gy-2 align-items-center mt-2 mt-sm-0">
                    <div class="col-2">
                        <span>Filter By:</span>
                    </div> 
                    <div class="col-sm-5">
                        <select class="form-control" name="subject">
                            <option value="">Select Type</option>
                            <option value="obj">Objective Only</option>
                            <option calue="theory">Theory Only</option>
                            <option value="objtheory">Both</option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group my-2 my-sm-0">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <button class="btn btn-outline-primary" type="submit">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>#Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Subject</th>
                        <th>Total Marks</th>
                        <th>Due by</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            Exam on Linear algebra <span class="badge bg-success">Published</span><br>
                            <span class="badge bg-primary">Objective</span>
                            <span class="badge bg-primary">Theory</span>
                        </td>
                        <td>An Exam to test your skills in linear algebra</td>
                        <td>Mathematics</td>
                        <td>
                            <b>Objective:</b> <span class="text-success">50</span> marks<br>
                            <b>Theory:</b> <span class="text-success">50</span> marks<br>
                            <b>Total:</b> <span class="text-success">100</span> marks
                        </td>
                        <td>10th, September, 2024 12:30pm</td>
                        <td>
                            <!-- <a href="Exam-edit.php" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="Exam-edit-questions.php" class="btn btn-secondary">
                                <i class="fa fa-question-circle-o"></i>
                            </a> -->
                            <a href="exam-view.php" class="btn btn-success">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            Exam on Linear algebra <span class="badge bg-danger">Unpublished</span><br>
                            <span class="badge bg-primary">Objective</span>
                            <span class="badge bg-primary">Theory</span>
                        </td>
                        <td>An Exam to test your skills in linear algebra</td>
                        <td>Mathematics</td>
                        <td>
                            <b>Objective:</b> <span class="text-success">50</span> marks<br>
                            <b>Theory:</b> <span class="text-success">50</span> marks<br>
                            <b>Total:</b> <span class="text-success">100</span> marks
                        </td>
                        <td>10th, September, 2024 12:30pm</td>
                        <td>
                            <!-- <a href="Exam-edit.php" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="Exam-edit-questions.php" class="btn btn-secondary">
                                <i class="fa fa-question-circle-o"></i>
                            </a> -->
                            <a href="exam-view.php" class="btn btn-success">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            Exam on Linear algebra <span class="badge bg-danger">Unpublished</span><br>
                            <span class="badge bg-primary">Objective</span>
                            <span class="badge bg-primary">Theory</span>
                        </td>
                        <td>An Exam to test your skills in linear algebra</td>
                        <td>Mathematics</td>
                        <td>
                            <b>Objective:</b> <span class="text-success">50</span> marks<br>
                            <b>Theory:</b> <span class="text-success">50</span> marks<br>
                            <b>Total:</b> <span class="text-success">100</span> marks
                        </td>
                        <td>10th, September, 2024 12:30pm</td>
                        <td>
                            <!-- <a href="Exam-edit.php" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="Exam-edit-questions.php" class="btn btn-secondary">
                                <i class="fa fa-question-circle-o"></i>
                            </a> -->
                            <a href="exam-view.php" class="btn btn-success">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="empty-table pt-5 mb-5">
            <h4>All Exams</h4>

            <div class="border rounded d-flex align-items-center justify-content-center p-5">
                <div class="empty-container d-flex flex-column text-center">
                    <i class="fa fa-frown-o mb-2 fs-1"></i>
                    <p class="mb-2">No recent Exams to display yet.</p>
                    <a href="#">Create New Exam</a>
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