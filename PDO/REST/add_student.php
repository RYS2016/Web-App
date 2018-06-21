<?php
// Get the student data
$course_id = filter_input(INPUT_POST, 'course_id');
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
// Validate inputs
if ($course_id == null || $course_id == false ||
 $first_name == null || $last_name == null ||
 $email == null || $email == false) {
 $error = "Invalid Student data. Check all fields and try again.";
 include('error.php');
} else {
 require_once('database.php');
 // Add the student to the database
 $query = 'INSERT INTO sk_students
 (courseID, firstName, lastName, email)
 VALUES
 (:course_id, :first_name, :last_name, :email)';
 $statement = $db->prepare($query);
 $statement->bindValue(':course_id', $course_id);
 $statement->bindValue(':first_name', $first_name);
 $statement->bindValue(':last_name', $last_name);
 $statement->bindValue(':email', $email);
 $statement->execute();
 $statement->closeCursor();
 // Display the Student List page
 include('index.php');
}
?>
///////////////////////////////////////////////////////////////////////
// File: delete_student.php
<?php
require_once('database.php');
// Get IDs
$student_id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);
$course_id = filter_input(INPUT_POST, 'course_id');
// Delete the student from the database
if ($student_id != false && $course_id != NULL) {
 $query = 'DELETE FROM sk_students
 WHERE studentID = :student_id';
 $statement = $db->prepare($query);
 $statement->bindValue(':student_id', $student_id);
 $success = $statement->execute();
 $statement->closeCursor();
}
// Display the Product List page
include('index.php');