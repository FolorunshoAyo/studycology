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

    $title = "Studycology - Instructors (Edit Assignment)";
    include "inc/header.php";
    include "inc/navbar.php";
?>  
    <div class="container my-4">
        <form action="action/add-assignment.php" class="border p-3 p-sm-5">
            <h4>Edit Assignment - (Mathematics Assignment: Algebra and Functions)</h4>
            <div class="mb-3">
                <label for="assignmentName" class="form-label">Assignment Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="e.g Mathematics Assignment: Algebra and Functions" id="assignmentName" required>
            </div>
            <div class="mb-3">
                <label for="assignmentDescription" class="form-label">Description</label>
                <textarea class="form-control" id="assignmentDescription" placeholder="Enter Description here" rows="3"></textarea>
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
                <label for="totalMarks" class="form-label">Total Marks <span class="text-danger">*</span></label>
                <input type="number" class="form-control" placeholder="e.g 10 or 50 or 100 " id="totalMarks" required>
            </div>
            <div class="mb-3">
                <label for="dueDate" class="form-label">Due Date <span class="text-danger">*</span></label>
                <input type="datetime-local" class="form-control" id="dueDate" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Assignment</button>
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