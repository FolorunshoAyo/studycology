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
        <div class="empty-table pt-5">
            <h4>All added CBT Questions</h4>

            <div class="border rounded d-flex align-items-center justify-content-center p-5">
                <div class="empty-container d-flex flex-column text-center">
                    <i class="fa fa-frown-o mb-2 fs-1"></i>
                    <p class="mb-2">No recent CBT Questions to display yet.</p>
                    <a href="#">Create New CBT Question</a>
                </div>
            </div>
        </div>
        <div class="list-table pt-5">
            <div class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                <h4 class="mb-0">All added CBT Questions</h4>
                <form action="./cbt-view.php" class="row gx-1 gy-2 align-items-center mt-2 mt-sm-0">
                    <div class="col-2">
                        <span>Filter By:</span>
                    </div> 
                    <div class="col-sm-5">
                        <select class="form-control" name="subject">
                            <option value="">Select Subject</option>
                            <option value="mathematics">Mathematics</option>
                            <option value="english">English</option>
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
                        <th>Subject</th>
                        <th>Type</th>
                        <th>Question</th>
                        <th>Options</th>
                        <th>Answer</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Mathematics</td>
                        <td>UTME</td>
                        <td>What is the capital of France?</td>
                        <td>
                            <ul>
                                <li>A) Berlin</li>
                                <li>B) Madrid</li>
                                <li>C) Paris</li>
                                <li>D) Rome</li>
                            </ul>
                        </td>
                        <td><b>C</b></td>
                        <td><span class="badge bg-danger">inactive</span></td>
                        <td>
                            <a href="cbt-edit.php" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mathematics</td>
                        <td>UTME</td>
                        <td>What is the capital of France?</td>
                        <td>
                            <ul>
                                <li>A) Berlin</li>
                                <li>B) Madrid</li>
                                <li>C) Paris</li>
                                <li>D) Rome</li>
                            </ul>
                        </td>
                        <td><b>C</b></td>
                        <td><span class="badge bg-danger">inactive</span></td>
                        <td>
                            <a href="cbt-edit.php" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mathematics</td>
                        <td>UTME</td>
                        <td>What is the capital of France?</td>
                        <td>
                            <ul>
                                <li>A) Berlin</li>
                                <li>B) Madrid</li>
                                <li>C) Paris</li>
                                <li>D) Rome</li>
                            </ul>
                        </td>
                        <td><b>C</b></td>
                        <td><span class="badge bg-danger">inactive</span></td>
                        <td>
                            <a href="cbt-edit.php" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                </table>
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