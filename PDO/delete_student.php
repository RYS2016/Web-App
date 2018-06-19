<?php
require_once('database.php');

// Get IDs
$student_id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);
$course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);

// Delete the student from the database
if ($student_id != false && $course_id != false) {
    $query = 'DELETE FROM sk_students
              WHERE studentID = :student_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':student_id', $student_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the student List page
include('index.php');