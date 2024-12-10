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
                <h4 id="assignment-name">Assignment Name <span class="fs-6 badge bg-danger">Unpublished</span></h2>
                <p class="fs-5"><b>Score:</b> - 80/100</p>
            </div>
            <div>
                <a href="assignment-edit.php" class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</a>
                <a href="assignment-edit-questions.php" class="btn btn-secondary"><i class="fa fa-question-circle-o"></i> Edit Questions</a>
                <a href="assignment-submissions.php" class="btn btn-secondary"><i class="fa fa-th-list"></i> View Submissions</a>
            </div>
        </div>

        <!-- Nav tabs for Objective and Theory Questions -->
        <ul class="nav nav-tabs" id="assignmentTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="objective-tab" data-bs-toggle="tab" href="#objective" role="tab" aria-controls="objective" aria-selected="true">Objective Questions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="theory-tab" data-bs-toggle="tab" href="#theory" role="tab" aria-controls="theory" aria-selected="false">Theory Questions</a>
            </li>
        </ul>

        <div class="tab-content mt-3" id="assignmentTabsContent">
            <!-- Objective Questions Tab -->
            <div class="tab-pane fade show active" id="objective" role="tabpanel" aria-labelledby="objective-tab">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Options</th>
                            <th>Answer</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>What is the capital of France?</td>
                            <td>
                                <ul>
                                    <li>A) Berlin</li>
                                    <li>B) Madrid</li>
                                    <li>C) Paris</li>
                                    <li>D) Rome</li>
                                </ul>
                            </td>
                            <td>C) Paris</td>
                            <td><b class="text-success">20</b></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Which planet is known as the Red Planet?</td>
                            <td>
                                <ul>
                                    <li>A) Earth</li>
                                    <li>B) Mars</li>
                                    <li>C) Jupiter</li>
                                    <li>D) Saturn</li>
                                </ul>
                            </td>
                            <td>B) Mars</td>
                            <td><b class="text-success">20</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Theory Questions Tab -->
            <div class="tab-pane fade" id="theory" role="tabpanel" aria-labelledby="theory-tab">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Response Type</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Explain the theory of relativity.</td>
                            <td>Media</td>
                            <td><b class="text-success">20</b></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>What is the significance of the cell theory?</td>
                            <td>Text</td>
                            <td><b class="text-success">20</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-end my-4">
            <button type="submit" class="btn btn-primary">Publish Assignment</button>
        </div>
    </div>

    <div style="height: 30vh">&nbsp;</div>
    
    <!-- Footer -->
    <?php include "inc/footer.php"; ?>
<?php
}else{
  $em = "You need to login to access your page";
  Util::redirect("../login.php", "error", $em);
}
?>