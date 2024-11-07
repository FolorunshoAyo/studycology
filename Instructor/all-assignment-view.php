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
                <h4 class="mb-0">All added Assignments</h4>
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
                        <th>Marks</th>
                        <th>Due by</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            Assignment on Linear algebra <br>
                            <span class="badge bg-success">Objective</span>
                            <span class="badge bg-success">Theory</span>
                        </td>
                        <td>An assignment to test your skills in linear algebra</td>
                        <td>Mathematics</td>
                        <td>100</td>
                        <td>10th, September, 2024 12:30pm</td>
                        <td>
                            <a href="javascript:void()" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="javascript:void()" class="btn btn-success">
                                <i class="fa fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            Assignment on Linear algebra <br>
                            <span class="badge bg-success">Objective</span>
                            <span class="badge bg-success">Theory</span>
                        </td>
                        <td>An assignment to test your skills in linear algebra</td>
                        <td>Mathematics</td>
                        <td>100</td>
                        <td>10th, September, 2024 12:30pm</td>
                        <td>
                            <a href="javascript:void()" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="javascript:void()" class="btn btn-success">
                                <i class="fa fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            Assignment on Linear algebra <br>
                            <span class="badge bg-success">Objective</span>
                            <span class="badge bg-success">Theory</span>
                        </td>
                        <td>An assignment to test your skills in linear algebra</td>
                        <td>Mathematics</td>
                        <td>100</td>
                        <td>10th, September, 2024 12:30pm</td>
                        <td>
                            <a href="javascript:void()" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="javascript:void()" class="btn btn-success">
                                <i class="fa fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="empty-table pt-5">
            <h4>All Assignments</h4>

            <div class="border rounded d-flex align-items-center justify-content-center p-5">
                <div class="empty-container d-flex flex-column text-center">
                    <i class="fa fa-frown-o mb-2 fs-1"></i>
                    <p class="mb-2">No recent Assignments to display yet.</p>
                    <a href="#">Create New Assignment</a>
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