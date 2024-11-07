<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="../assets/img/Logo.png" alt="Online learning system" width="50" height="40">
      Studycology
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item position-relative">
          <a class="nav-link <?= Util::isActive("index")? "active" : "" ?>" href="./"> <i class="fa fa-home"></i> Dashboard </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= Util::isActive("cbt-add") ||  Util::isActive("cbt-view")? "active" : "" ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            CBT
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./cbt-add.php">Add CBT Test Question</a></li>
            <li><a class="dropdown-item" href="./cbt-view.php">View CBT Questions</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= Util::isActive("all-assignment-view") ||  Util::isActive("assignment-add") ||  Util::isActive("assignment-edit") || Util::isActive("assignment-submissions") || Util::isActive("assignment-view")? "active" : "" ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Assignment
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./assignment-add.php">Add New Assignment</a></li>
            <li><a class="dropdown-item" href="./all-assignment-view.php">View all Assignments</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Exam
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Add New Exam</a></li>
            <li><a class="dropdown-item" href="#">View all Exams</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Notes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Create New Note</a></li>
            <li><a class="dropdown-item" href="#">Create Note Chapter</a></li>
            <li><a class="dropdown-item" href="#">Create Note Topic</a></li>
            <li><a class="dropdown-item" href="#">Create Note Content</a></li>
            <li><a class="dropdown-item" href="#">Create Note Content</a></li>
            <li><a class="dropdown-item" href="#">Add Note Quiz</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Books
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Upload New Book</a></li>
            <li><a class="dropdown-item" href="#">View all</a></li>
          </ul>
        </li>
        <!-- <li class="nav-item position-relative">
          <a class="nav-link" href="Courses.php"> Your Notes</a>
        </li>

        <li class="nav-item position-relative">
          <a class="nav-link" href="Courses-Materials.php">Courses Materials</a>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Create
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Courses-add.php">Create New Courses</a></li>
            <li><a class="dropdown-item" href="Courses-add.php#Chapter">Create Chapter</a></li>
            <li><a class="dropdown-item" href="Courses-add.php#Topic">Create Topic</a></li>
            <li><a class="dropdown-item" href="Courses-content-add.php">Create Course Content</a></li>
          </ul>
        </li> -->
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Profile-View.php">View Profile</a></li>
            <li><a class="dropdown-item" href="Profile-Edit.php">Edit Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="../Logout.php">Logout</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Notifications</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
          <li class="list-group-item">New course started</b></li>
          <li class="list-group-item">New course started</b></li>
        </ul>
      </div>
    </div>
  </div>
</div>