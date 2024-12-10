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
        <h4 id="assignment-name">Edit Assignment (Mathematical Assignment for the new term)</h4>

        <p>
            In this section select between the objective or theory tab and click on edit question to open an edit modal
        </p>
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
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Options</th>
                                <th>Answer</th>
                                <th>Score</th>
                                <th>Action</th>
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
                                <td><b class="text-success">10</b></td>
                                <td>
                                    <button class="edit-objective btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-id="1" data-question="What is the capital of France?" data-option-a="Berlin" data-option-b="Madrid" data-option-c="Paris" data-option-d="Rome" data-answer="c">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <button class="delete-objective btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteObjectiveModal" data-id="1" data-question="What is the significance of the cell theory?" data-response-type="media">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </td>
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
                                <td>
                                    <button class="edit-objective btn btn-primary" data-bs-toggle="modal" data-bs-target="#editObjectiveModal" data-id="2" data-question="Which planet is known as the Red Planet?" data-option-a="Earth" data-option-b="Mars" data-option-c="Jupiter" data-option-d="Saturn" data-answer="c">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <button class="delete-objective btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteObjectiveModal" data-id="2" data-question="What is the significance of the cell theory?" data-response-type="media">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 text-end">
                    <button class="add-objective btn btn-primary">Add Objective</button>
                </div>
            </div>

            <!-- Theory Questions Tab -->
            <div class="tab-pane fade" id="theory" role="tabpanel" aria-labelledby="theory-tab">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Response Type</th>
                                <th>Score</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Explain the theory of relativity.</td>
                                <td>Media</td>
                                <td><b class="text-success">20</b></td>
                                <td>
                                    <button class="edit-theory btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTheoryModal" data-id="1" data-question="Explain the theory of relativity." data-response-type="media">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <button class="delete-theory btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTheoryModal" data-id="1">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>What is the significance of the cell theory?</td>
                                <td>Text</td>
                                <td><b class="text-success">20</b></td>
                                <td>
                                    <button class="edit-theory btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTheoryModal" data-id="2" data-question="What is the significance of the cell theory?" data-response-type="media">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <button class="delete-theory btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTheoryModal" data-id="2">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 text-end">
                    <button class="add-theory btn btn-primary">Add Theory</button>
                </div>
            </div>
        </div>

        <div style="height: 30vh">&nbsp;</div>

        <!-- Add Objective Question Modal -->
        <div class="modal fade" id="addObjectiveModal" tabindex="-1" aria-labelledby="addObjectiveModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addObjectiveModalLabel">Add Objective Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addObjectiveForm">
                            <div class="mb-3">
                                <label for="objectiveQuestion" class="form-label">Question</label>
                                <textarea class="form-control" id="objectiveQuestion" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Options</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" id="optionA" required>
                                    <label class="form-check-label" for="optionA">A) <input type="text" id="optionAInput" class="form-control" placeholder="Enter option A"></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" id="optionB" required>
                                    <label class="form-check-label" for="optionB">B) <input type="text" id="optionBInput" class="form-control" placeholder="Enter option B"></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" id="optionC" required>
                                    <label class="form-check-label" for="optionC">C) <input type="text" id="optionCInput" class="form-control" placeholder="Enter option C"></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" id="optionD" required>
                                    <label class="form-check-label" for="optionD">D) <input type="text" id="optionDInput" class="form-control" placeholder="Enter option D"></label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="objectiveScore" class="form-label">Score</label>
                                <input type="number" class="form-control" id="objectiveScore" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveObjective">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Theory Question Modal -->
        <div class="modal fade" id="addTheoryModal" tabindex="-1" aria-labelledby="addTheoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTheoryModalLabel">Add Theory Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addTheoryForm">
                            <div class="mb-3">
                                <label for="theoryQuestion" class="form-label">Question</label>
                                <textarea class="form-control" id="theoryQuestion" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="responseType" class="form-label">Response Type</label>
                                <select id="responseType" class="form-select">
                                    <option value="text">Text</option>
                                    <option value="media">Media</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="theoryScore" class="form-label">Score</label>
                                <input type="number" class="form-control" id="theoryScore" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveTheory">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Edit Objective Question Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Objective Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editObjectiveForm">
                            <input type="hidden" id="editQuestionId">
                            <div class="mb-3">
                                <label for="editObjectiveQuestion" class="form-label">Question</label>
                                <textarea class="form-control" id="editObjectiveQuestion" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Options</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editAnswer" id="editOptionA" required>
                                    <label class="form-check-label" for="editOptionA">A) <input type="text" id="editOptionAInput" class="form-control" placeholder="Enter option A"></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editAnswer" id="editOptionB" required>
                                    <label class="form-check-label" for="editOptionB">B) <input type="text" id="editOptionBInput" class="form-control" placeholder="Enter option B"></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editAnswer" id="editOptionC" required>
                                    <label class="form-check-label" for="editOptionC">C) <input type="text" id="editOptionCInput" class="form-control" placeholder="Enter option C"></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="editAnswer" id="editOptionD" required>
                                    <label class="form-check-label" for="editOptionD">D) <input type="text" id="editOptionDInput" class="form-control" placeholder="Enter option D"></label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveEdit">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Theory Question Modal -->
        <div class="modal fade" id="editTheoryModal" tabindex="-1" aria-labelledby="editTheoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTheoryModalLabel">Edit Theory Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editTheoryForm">
                            <input type="hidden" id="editTheoryQuestionId">
                            <div class="mb-3">
                                <label for="editTheoryQuestion" class="form-label">Question</label>
                                <textarea class="form-control" id="editTheoryQuestion" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editResponseType" class="form-label">Response Type</label>
                                <select id="editResponseType" class="form-select">
                                    <option value="text">Text</option>
                                    <option value="media">Media</option>
                                </select>
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

        <!-- Delete Objective Question Confirmation Modal -->
        <div class="modal fade" id="deleteObjectiveModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirm Objective Question Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="question" id="deleteObjectiveQuestionId">
                        <p>Are you sure you want to delete this objective question? Please Note this action is irreversible.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="confirmObjectiveDeletion">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Theory Question Confirmation Modal -->
        <div class="modal fade" id="deleteTheoryModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirm Theory Question Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="question" id="deleteTheoryQuestionId">
                        <p>Are you sure you want to delete this theory question? Please Note this action is irreversible.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="confirmTheoryDeletion">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        $('#questionType').on('change', function() {
            const selectedType = $(this).val();
            $('#objectiveFields').toggle(selectedType === 'objective');
            $('#theoryFields').toggle(selectedType === 'theory');
        });

        $(document).ready(function() {
            // $('.questionEditor').richText({
            //     // Enable specific options
            //     includeToolbar: true,
            //     bold: true,
            //     italic: true,
            //     underline: true,
            //     leftAlign: true,
            //     centerAlign: true,
            //     rightAlign: true,
            //     justify: true,
            //     ol: true,
            //     ul: true,
            //     heading:true,
            //     fonts: false,
            //     urls: false,
            //     table: false,
            //     removeStyles: true,
            //     code: true,
            //     fileUpload: false,
            //     embed: false,
            //     imageUpload: false,
            // });
            // $('#solution').richText({
            //     // Enable specific options
            //     includeToolbar: true,
            //     bold: true,
            //     italic: true,
            //     underline: true,
            //     leftAlign: true,
            //     centerAlign: true,
            //     rightAlign: true,
            //     justify: true,
            //     ol: true,
            //     ul: true,
            //     heading:true,
            //     fonts: false,
            //     urls: false,
            //     table: false,
            //     removeStyles: true,
            //     code: true,
            //     fileUpload: false,
            //     embed: false,
            //     imageUpload: false,
            // });

            // $('.edit-objective').on('click', function() {
            //     const $button = $(this);
            //     $('#editQuestionId').val($button.data('id'));
            //     $('#editObjectiveQuestion').html($button.data('question'));
            //     $('#editOptionAInput').val($button.data('option-a'));
            //     $('#editOptionBInput').val($button.data('option-b'));
            //     $('#editOptionCInput').val($button.data('option-c'));
            //     $('#editOptionDInput').val($button.data('option-d'));
            //     $('input[name="editAnswer"]').prop('checked', false);
            //     $(`#editOption${$button.data('answer').charAt(0).toUpperCase()}`).prop('checked', true);
            //     $('#editModal').modal('show');
            // });

            // // Populate the theory modal
            // $('.edit-theory').on('click', function() {
            //     const $button = $(this);
            //     $('#editTheoryQuestionId').val($button.data('id'));
            //     $('#editTheoryQuestion').val($button.data('question'));
            //     $('#editTheoryModal').modal('show');
            // });

            // Open Add Objective Question Modal
            $(".add-objective").on('click', function() {
                $('#addObjectiveModal').modal('show');
            });

            // Open Add Theory Question Modal
            $(".add-theory").on('click', function() {
                $('#addTheoryModal').modal('show');
            });

            // Handle Save for Objective Question
            $('#saveObjective').on('click', function() {
                const question = $('#objectiveQuestion').val();
                const optionA = $('#optionAInput').val();
                const optionB = $('#optionBInput').val();
                const optionC = $('#optionCInput').val();
                const optionD = $('#optionDInput').val();
                const answer = $('input[name="answer"]:checked').val();
                const objectiveScore = $('#objectiveScore').val();

                console.log(question, optionA, optionB, optionC, optionD, answer, objectiveScore);
                // Send data via AJAX
                // $.ajax({
                //     url: 'add_objective_question.php',  // Replace with your server-side script
                //     method: 'POST',
                //     data: {
                //         question,
                //         optionA,
                //         optionB,
                //         optionC,
                //         optionD,
                //         answer
                //     },
                //     success: function(response) {
                //         console.log(response); // Handle the response as needed
                //         $('#addObjectiveModal').modal('hide'); // Close the modal
                //     }
                // });
                $('#addObjectiveModal').modal('hide');
            });

            // Handle Save for Theory Question
            $('#saveTheory').on('click', function() {
                const theoryQuestion = $('#theoryQuestion').val();
                const responseType = $('#responseType').val();
                const theoryScore = $('#theoryScore').val();

                console.log({theoryQuestion, responseType, theoryScore});
                // Send data via AJAX
                // $.ajax({
                //     url: 'add_theory_question.php',  // Replace with your server-side script
                //     method: 'POST',
                //     data: {
                //         theoryQuestion,
                //         responseType
                //     },
                //     success: function(response) {
                //         console.log(response); // Handle the response as needed
                //         $('#addTheoryModal').modal('hide'); // Close the modal
                //     }
                // });
                $('#addTheoryModal').modal('hide');
            });

            $('.edit-objective').on('click', function() {
                const $button = $(this);
                const questionId = $button.data('id');
                const question = $button.data('question');
                const optionA = $button.data('option-a');
                const optionB = $button.data('option-b');
                const optionC = $button.data('option-c');
                const optionD = $button.data('option-d');
                const answer = $button.data('answer');

                // Set the values for the option and questions

                $("#editObjectiveQuestion").val(question);
                $('#editOptionAInput').val(optionA);
                $('#editOptionBInput').val(optionB);
                $('#editOptionCInput').val(optionC);
                $('#editOptionDInput').val(optionD);

                // Set the checked answer
                $('input[name="editAnswer"]').prop('checked', false);
                $(`#editOption${answer.charAt(0).toUpperCase()}`).prop('checked', true);

                $('#editModal').modal('show');
            });

            // Populate the theory modal
            $('.edit-theory').on('click', function() {
                const $button = $(this);
                const theoryQuestionId = $button.data('id');
                const theoryQuestion = $button.data('question');
                const responseType = $button.data('response-type');  // Get the response type from data

                // Set the question text
                $("#editTheoryQuestion").val(theoryQuestion);
                $('#editResponseType').find('option').each(function() {
                    console.log($(this).val(), responseType);
                    if ($(this).val() === responseType) {
                        $(this).prop('selected', true);  // Manually select the option
                    }
                });
                // Show the modal
                $('#editTheoryModal').modal('show');
            });

            // Save changes for Objective Questions
            $('#saveEdit').on('click', function() {
                const questionId = $('#editQuestionId').val();
                const question = $('#editObjectiveQuestion').val();
                const optionA = $('#editOptionAInput').val();
                const optionB = $('#editOptionBInput').val();
                const optionC = $('#editOptionCInput').val();
                const optionD = $('#editOptionDInput').val();
                const answer = $('input[name="editAnswer"]:checked').val();

                // Handle AJAX update logic here
                console.log({ questionId, question, optionA, optionB, optionC, optionD, answer });

                $('#editModal').modal('hide');
            });

            // Save changes for Theory Questions
            $('#saveTheoryEdit').on('click', function() {
                const theoryQuestionId = $('#editTheoryQuestionId').val();
                const theoryQuestion = $('#editTheoryQuestion').val();
                const theoryResponseType = $('#editResponseType').val();

                // Handle AJAX update logic here
                console.log({ theoryQuestionId, theoryQuestion, theoryResponseType });

                $('#editTheoryModal').modal('hide');
            });

            // Show confirm deletion modal for Objective Questions
            $('.delete-objective').on('click', function() {
                const $button = $(this);
                const objectiveQuestionId = $button.data('id');

                $("#deleteObjectiveQuestionId").val(objectiveQuestionId)
                // Handle AJAX update logic here
                console.log({ objectiveQuestionId });

                $('#deleteObjectiveModal').modal('show');
            });

            // Handle confirmation of scoring
            $('#confirmObjectiveDeletion').click(function () {
                // Here you can handle the final submission to save the score and comment
                var questionId = $('#deleteObjectiveQuestionId').val();

                // Example: Send data to server (You can modify this with your actual backend logic)
                console.log({ questionId });
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
                $('#deleteObjectiveModal').modal('hide');
            });

            // Save changes for Theory Questions
            $('.delete-theory').on('click', function() {
                const $button = $(this);
                const theoryQuestionId = $button.data('id');

                $("#deleteTheoryQuestionId").val(theoryQuestionId);

                // Handle AJAX update logic here
                console.log({ theoryQuestionId });

                $('#deleteTheoryModal').modal('show');
            });

            // Handle confirmation of scoring
            $('#confirmTheoryDeletion').click(function () {
                // Here you can handle the final submission to save the score and comment
                var questionId = $('#deleteTheoryQuestionId').val();

                // Example: Send data to server (You can modify this with your actual backend logic)
                console.log({ questionId });
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
                $('#deleteTheoryModal').modal('hide');
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