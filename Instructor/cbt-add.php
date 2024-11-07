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

    $title = "Studycology - Instructors (Add CBT question)";
    include "inc/header.php";
    include "inc/navbar.php";
?>  
    <div class="container my-4">
        <form action="action/add-cbt.php" class="border p-3 p-sm-5">
            <h4>Create CBT Question</h4>
            <div class="mb-3">
                <label for="chapterSelect" class="form-label">Select Subject</label>
                <select class="form-select" id="chapterSelect" name="subject_id" required>
                    <option value="">Select Subject</option>
                    <option value="">Mathematics</option>
                    <option value="">English</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="examyear" class="form-label">Select Exam Type</label>
                <select class="form-select" id="examyear" name="examtype" required disabled>
                    <option value="utme">UTME</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Select Exam Year</label>
                <select class="form-select" id="subject" name="subject">
                    <option value="">Select Exam Year</option>
                <?php
                    $currentYear = date("Y"); // Get the current year
                    $startYear = 2000; // Define the starting year
                    $endYear = $currentYear; // Define the ending year based on the current year

                    for ($year = $startYear; $year <= $endYear; $year++) {
                        echo "<option value=\"$year\">$year</option>";
                    }
                ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="question" class="form-label">Enter Question</label>
                <textarea class="form-control" 
                      id="question" 
                      rows="4" 
                      name="question" 
                      placeholder="Enter CBT question" 
                      required >
                </textarea>
            </div>
            <div class="mb-3" >               
                <label class="form-label mt-3">Options</label>
                <div class="form-check d-flex gap-2 align-items-center">
                    <input class="form-check-input" type="radio" name="answer" id="option_a" value="option_a" required>
                    <label class="form-check-label" for="option_d">A) <input type="text" name="option_a" class="form-control d-inline w-75" placeholder="Enter option A"></label>
                </div>
                <div class="form-check d-flex gap-2 align-items-center">
                    <input class="form-check-input" type="radio" name="answer" id="option_b" value="option_b" required>
                    <label class="form-check-label" for="option_b">B) <input type="text" name="option_b" class="form-control d-inline w-75" placeholder="Enter option B"></label>
                </div>
                <div class="form-check d-flex gap-2 align-items-center">
                    <input class="form-check-input" type="radio" name="answer" id="option_c" value="option_c" required>
                    <label class="form-check-label" for="option_c">C) <input type="text" name="option_c" class="form-control d-inline w-75" placeholder="Enter option C"></label>
                </div>
                <div class="form-check d-flex gap-2 align-items-center">
                    <input class="form-check-input" type="radio" name="answer" id="option_d" value="option_d" required>
                    <label class="form-check-label" for="option_d">D) <input type="text" name="option_d"class="form-control d-inline w-75" placeholder="Enter option D"></label>
                </div>
                <div class="form-check d-flex gap-2 align-items-center">
                    <input class="form-check-input" type="radio" name="answer" id="option_b" value="option_b" required>
                    <label class="form-check-label" for="option_e">E) <input type="text" name="option_b" class="form-control d-inline w-75" placeholder="Enter option E"></label>
                </div>
            </div>
            <div class="my-3">
                <label for="question" class="form-label">Enter Solution (Optional)</label>
                <textarea class="form-control" 
                      id="solution" 
                      rows="4" 
                      name="solution" 
                      placeholder="Enter CBT Solution" 
                      required >
                </textarea>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#question').richText({
                // Enable specific options
                includeToolbar: true,
                bold: true,
                italic: true,
                underline: true,
                leftAlign: true,
                centerAlign: true,
                rightAlign: true,
                justify: true,
                ol: true,
                ul: true,
                heading:true,
                fonts: false,
                urls: false,
                table: false,
                removeStyles: true,
                code: true,
                fileUpload: false,
                embed: false,
                imageUpload: false,
            });
            $('#solution').richText({
                // Enable specific options
                includeToolbar: true,
                bold: true,
                italic: true,
                underline: true,
                leftAlign: true,
                centerAlign: true,
                rightAlign: true,
                justify: true,
                ol: true,
                ul: true,
                heading:true,
                fonts: false,
                urls: false,
                table: false,
                removeStyles: true,
                code: true,
                fileUpload: false,
                embed: false,
                imageUpload: false,
            });
        });
    </script>
    <!-- Footer -->
    <?php include "inc/footer.php"; ?>
<?php
}else{
  $em = "You need to login to access your page";
  Util::redirect("../login.php", "error", $em);
}
?>