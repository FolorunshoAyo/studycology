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
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-id="1" data-question="What is the capital of France?" data-option-a="Berlin" data-option-b="Madrid" data-option-c="Paris" data-option-d="Rome" data-answer="option_c">
                                        <i class="fa fa-edit"></i> Edit
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
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-id="2" data-question="What is the capital of France?" data-option-a="Berlin" data-option-b="Madrid" data-option-c="Paris" data-option-d="Rome" data-answer="option_c">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Explain the theory of relativity.</td>
                                <td>Media</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTheoryModal" data-id="1" data-question="Explain the theory of relativity." data-reponse-type="media">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>What is the significance of the cell theory?</td>
                                <td>Text</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTheoryModal" data-id="2" data-question="Explain the theory of relativity." data-reponse-type="media">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div style="height: 20vh">&nbsp;</div>

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
                                <textarea class="form-control questionEditor" id="editObjectiveQuestion" rows="4" required></textarea>
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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveTheoryEdit">Save changes</button>
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
            $('.questionEditor').richText({
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

            $('.edit-objective').on('click', function() {
                const $button = $(this);
                $('#editQuestionId').val($button.data('id'));
                $('#editObjectiveQuestion').val($button.data('question'));
                $('#editOptionAInput').val($button.data('option-a'));
                $('#editOptionBInput').val($button.data('option-b'));
                $('#editOptionCInput').val($button.data('option-c'));
                $('#editOptionDInput').val($button.data('option-d'));
                $('input[name="editAnswer"]').prop('checked', false);
                $(`#editOption${$button.data('answer').charAt(0).toUpperCase()}`).prop('checked', true);
                $('#editModal').modal('show');
            });

            // Populate the theory modal
            $('.edit-theory').on('click', function() {
                const $button = $(this);
                $('#editTheoryQuestionId').val($button.data('id'));
                $('#editTheoryQuestion').val($button.data('question'));
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

                // Handle AJAX update logic here
                console.log({ theoryQuestionId, theoryQuestion });

                $('#editTheoryModal').modal('hide');
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