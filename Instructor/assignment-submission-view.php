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

    $title = "Studycology - Instructors (Student Single Submission View)";
    include "inc/header.php";
    include "inc/navbar.php";
?>  
    <div class="container mt-4 mb-2">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-0">Student Assignment Submission for (Assignment Name)</h4>
                <p class="fs-5"><b>Current Score:</b> - 80/100</p>
            </div>
        </div>

        <div class="mb-5">
            <ul class="list-group ">
                <li class="list-group-item fw-bold">Student Information</li>
                <li class="list-group-item">
                    <div class="fw-bold">Full Name</div>
                    Shodiya Folorunsho Ayomide
                </li>
                <li class="list-group-item">
                    <div class="fw-bold">Email</div>
                    folushoayomide11@gmail.com
                </li>
            </ul>
        </div>

        <!-- Nav tabs for Objective and Theory Questions -->
        <ul class="nav nav-tabs" id="assignmentTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="objective-tab" data-bs-toggle="tab" href="#objective" role="tab" aria-controls="objective" aria-selected="true">Objective Questions and Answers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="theory-tab" data-bs-toggle="tab" href="#theory" role="tab" aria-controls="theory" aria-selected="false">Theory Questions and Answer</a>
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
                            <th>Correct Answer</th>
                            <th>Selected Answer</th>
                            <th>Correct/Wrong</th>
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
                            <td>D) Rome</td>
                            <td>
                                <span class="text-danger"><i class="fa fa-times-circle-o"></i> Wrong</span>
                            </td>
                            <td><b class="text-danger">0</b></td>
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
                            <td>B) Mars</td>
                            <td>
                                <span class="text-success"><i class="fa fa-check"></i> Correct</span>
                            </td>
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
                            <th>Answer</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Explain the theory of relativity.</td>
                            <td>Media</td>
                            <td>
                                Media Upload @ <a href="../upload/assignments/Assignment-Picture65bd62d8c58246.12234750.png">upload/assignments/Assignment-Picture65bd62d8c58246.12234750.png</a>
                            </td>
                            <td>
                                No Score yet
                            </td>
                            <td>
                                <button class="score-btn btn btn-success">
                                    <i class="fa fa-star-o"></i> Score Answer
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>What is the significance of the cell theory?</td>
                            <td>Text</td>
                            <td>
                                Here is my detailed answer to the question
                            </td>
                            <td>
                                No Score yet
                            </td>
                            <td>
                                <button class="score-btn btn btn-success">
                                    <i class="fa fa-star-o"></i> Score Answer
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal to score the theory question -->
        <div class="modal fade" id="editTheoryModal" tabindex="-1" aria-labelledby="editTheoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTheoryModalLabel">Score Theory Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editTheoryForm">
                            <input type="hidden" id="editTheoryQuestionId">
                            <div class="mb-3">
                                <label for="editTheoryQuestion" class="form-label">Question</label>
                                <textarea class="form-control" id="editTheoryQuestion" rows="4" readonly></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editAnswer" class="form-label">Answer</label>
                                <div id="editAnswer"></div> <!-- Will display either media or text answer -->
                            </div>
                            <div class="mb-3">
                                <label for="editScore" class="form-label">Score</label>
                                <input type="number" class="form-control" id="editScore" required>
                            </div>
                            <div class="mb-3">
                                <label for="editComment" class="form-label">Comment</label>
                                <textarea class="form-control" id="editComment" rows="3" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveTheoryEdit">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Confirmation Modal -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirm Scoring</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to score this answer? N.B This score/performance would be sent via email to the intended student</p>
                        <p><strong>Score:</strong> <span id="confirmScore"></span></p>
                        <p><strong>Comment:</strong> <span id="confirmComment"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="confirmScoring">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div style="height: 30vh">&nbsp;</div>

    <script>
        $(document).ready(function () {
            // Handle click on "Score Answer" button
            $('.score-btn').click(function () {
                var questionId = $(this).closest('tr').find('td:first').text();
                var questionText = $(this).closest('tr').find('td:eq(1)').text();
                var answerType = $(this).closest('tr').find('td:eq(2)').text().trim();
                var answer = $(this).closest('tr').find('td:eq(3)').html();  // This could be media or text

                // Populate the modal with the relevant data
                $('#editTheoryQuestionId').val(questionId);
                $('#editTheoryQuestion').val(questionText);
                $('#editAnswer').html(answer);

                // Clear previous score and comment
                $('#editScore').val('');
                $('#editComment').val('');

                // Show the modal to score the question
                $('#editTheoryModal').modal('show');
            });

            // Handle saving the score and comment
            $('#saveTheoryEdit').click(function () {
                var score = $('#editScore').val();
                var comment = $('#editComment').val();

                // Validate score and comment fields
                if (score === '' || comment === '') {
                    alert('Both score and comment are required!');
                    return;
                }

                // Populate confirmation modal
                $('#confirmScore').text(score);
                $('#confirmComment').text(comment);

                // Show confirmation modal
                $('#confirmationModal').modal('show');
            });

            // Handle confirmation of scoring
            $('#confirmScoring').click(function () {
                // Here you can handle the final submission to save the score and comment
                var questionId = $('#editTheoryQuestionId').val();
                var score = $('#editScore').val();
                var comment = $('#editComment').val();

                // Example: Send data to server (You can modify this with your actual backend logic)
                console.log({questionId, score, comment});
                // $.ajax({
                //     url: 'submit_score.php',  // Replace with the correct server-side script to save the score
                //     method: 'POST',
                //     data: {
                //         questionId: questionId,
                //         score: score,
                //         comment: comment
                //     },
                //     success: function (response) {
                //         alert('Score and comment saved successfully!');
                //         $('#confirmationModal').modal('hide');
                //         $('#editTheoryModal').modal('hide');
                //     },
                //     error: function () {
                //         alert('Error saving the score and comment.');
                //     }
                // });
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