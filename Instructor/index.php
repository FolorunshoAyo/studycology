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

    $title = "Studycology - Instructors";
    include "inc/header.php";
    include "inc/navbar.php";
?>  
    <div class="p-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 mb-2"> 
                <div class="card bg-success text-white">
                    <div class="card-content">
                        <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-sticky-note-o fs-1 float-start"></i>
                            </div>
                            <div class="flex-fill text-end">
                                <h3>278</h3>
                                <span>Assignments</span>
                            </div>
                        </div>
                        </div>
                        <div class="card-footer p-0">
                            <a href="#" class="py-2 px-3 d-flex align-items-center text-decoration-none text-white">
                                View Details <i class="ms-2 fa fa-arrow-right"></i>
                            </a>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2"> 
                <div class="card bg-danger text-white">
                    <div class="card-content">
                        <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-sticky-note-o fs-1 float-start"></i>
                            </div>
                            <div class="flex-fill text-end">
                                <h3>278</h3>
                                <span>Exams</span>
                            </div>
                        </div>
                        </div>
                        <div class="card-footer p-0">
                            <a href="#" class="py-2 px-3 d-flex align-items-center text-decoration-none text-white">
                                View Details <i class="ms-2 fa fa-arrow-right"></i>
                            </a>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12"> 
                <div class="card bg-warning text-white">
                    <div class="card-content">
                        <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-sticky-note-o fs-1 float-start"></i>
                            </div>
                            <div class="flex-fill text-end">
                                <h3>278</h3>
                                <span>Total Questions</span>
                            </div>
                        </div>
                        </div>
                        <div class="card-footer p-0">
                            <a href="#" class="py-2 px-3 d-flex align-items-center text-decoration-none text-white">
                                View Details <i class="ms-2 fa fa-arrow-right"></i>
                            </a>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12"> 
                <div class="card bg-info text-white">
                    <div class="card-content">
                        <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-sticky-note-o fs-1 float-start"></i>
                            </div>
                            <div class="flex-fill text-end">
                                <h3>278</h3>
                                <span>Total Theories</span>
                            </div>
                        </div>
                        </div>
                        <div class="card-footer p-0">
                            <a href="#" class="py-2 px-3 d-flex align-items-center text-decoration-none text-white">
                                View Details <i class="ms-2 fa fa-arrow-right"></i>
                            </a>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-table pt-5">
            <h4>All Exams</h4>

            <table class="table table-bordered">
                <tr>
                    <th>#Id</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Time Limit</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Practice exam for improving your grades</td>
                    <td>English</td>
                    <td>100</td>
                    <td>60min</td>
                    <td><span class="badge bg-danger">inactive</span></td>
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
                    <td>2</td>
                    <td>Mathematics for WASSCE (Level 1)</td>
                    <td>Mathematics</td>
                    <td>100</td>
                    <td>60min</td>
                    <td><span class="badge bg-success">active</span></td>
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
                    <td>Chemistry Hero Exam to Ace your JAMB</td>
                    <td>Chemistry</td>
                    <td>120</td>
                    <td>30min</td>
                    <td><span class="badge bg-success">active</span></td>
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
        <div class="list-table pt-5">
            <h4>All Assignments</h4>

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
                    <td>Practice exam for improving your grades</td>
                    <td>An assignment to be submitted in due time</td>
                    <td>100</td>
                    <td>60min</td>
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
    <!-- Footer -->
    <?php include "inc/footer.php"; ?>
<?php
}else{
  $em = "You need to login to access your page";
  Util::redirect("../login.php", "error", $em);
}
?>