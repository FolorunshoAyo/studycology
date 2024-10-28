<?php  
session_start();
include "../utils/validation.php";
include "../utils/util.php";
include "../database.php";
include "../models/student.php";
include "../models/admin.php";
include "../models/instructor.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$user_name = Validation::clean($_POST["username"]);
   $password = Validation::clean($_POST["password"]);
	$role = Validation::clean($_POST["role"]);
    
    if (!Validation::username($user_name)) {
    	$em = "Invalid username";
	    Util::redirect("../login.php", "error", $em);
    }else if(!Validation::password($password)){
    	$em = "Invalid password";
	    Util::redirect("../login.php", "error", $em);
    }else {
      
       $db = new Database();
       $conn = $db->connect();
       
       if ($role == "Student") {
          // Student login
          $Student = new Student($conn);
          $auth = $Student->authenticate($user_name, $password);
          if ($auth) {
          	$student_data = $Student->getData();
            $_SESSION['username'] = $student_data['username'];
            $_SESSION['student_id'] = $student_data['student_id'];
            $sm = "logged in!";
            $conn = null;
            Util::redirect("../student/index.php", "success", $sm);
          }else {
             $em = "Incorrect username or password";
   	       Util::redirect("../login.php", "error", $em);
          }
       }else if ($role == "Instructor") {
        // Instructure login 

          $instructor = new Instructor($conn);
          $auth = $instructor->authenticate($user_name, $password);
          if ($auth) {
            $instructor_data = $instructor->getData();
            $_SESSION['username'] = $instructor_data['username'];
            $_SESSION['instructor_id'] = $instructor_data['instructor_id'];
            $sm = "logged in!";
            $conn = null;
            Util::redirect("../instructor/index.php", "success", $sm);
          }else {
             $em = "Incorrect username or password";
             Util::redirect("../login.php", "error", $em);
          }
       }else {
          // Admin login 
          $admin = new Admin($conn);
          $auth = $admin->authenticate($user_name, $password);
          if ($auth) {
            $admin_data = $admin->get();
            $_SESSION['username'] = $admin_data['username'];
            $_SESSION['admin_id'] = $admin_data['admin_id'];
            $sm = "logged in!";
            $conn = null;
            Util::redirect("../admin/index.php", "success", $sm);
          }else {
             $em = "Incorrect username or password";
             Util::redirect("../login.php", "error", $em);
          }
       }
    } 

}else {
	$em = "An error occurred";
	Util::redirect("../login.php", "error", $em);
}