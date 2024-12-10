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

    $title = "Studycology - Instructors (Create a new Exam)";
    include "inc/header.php";
    include "inc/navbar.php";
?>  
    <div class="container my-4">
        <form action="action/add-exam.php" class="border p-3 p-sm-5">
            <h4>Create Exam</h4>
            <div class="mb-3">
                <label for="examName" class="form-label">Exam Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="e.g Mathematics Exam: Algebra and Functions" id="examName" required>
            </div>
            <div class="mb-3">
                <label for="examDescription" class="form-label">Description</label>
                <textarea class="form-control" id="examDescription" placeholder="Enter Description here" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="subjectSelect" class="form-label">Subject <span class="text-danger">*</span></label>
                <select class="form-select" id="subjectSelect" required>
                    <option value="" disabled selected>Select a subject</option>
                    <option value="math">Mathematics</option>
                    <option value="english">English</option>
                    <option value="history">History</option>
                    <!-- Add more subjects as needed -->
                </select>
            </div>
            <div class="mb-3">
                <label for="totalScore" class="form-label">Total Score <span class="text-danger">*</span></label>
                <input type="number" class="form-control" placeholder="e.g 10 or 50 or 100 " id="totalScore" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Exam</button>
        </form>
    </div>
    <!-- Footer -->
    <?php include "inc/footer.php"; ?>
<?php
}else{
  $em = "You need to login to access your page";
  Util::redirect("../login.php", "error", $em);
}
?>