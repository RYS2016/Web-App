<?php
// Get the course data
$course_id = filter_input(INPUT_POST, 'course_id');
$course_name = filter_input(INPUT_POST, 'course_name');
// Validate inputs
if (($course_id == null) || ($course_name == null)) {
 $error = "Invalid Course data. Check all fields and try again.";
 include('error.php');
} else {
 require_once('database.php');
 // Add the product to the database
 $query = 'INSERT INTO sk_courses
 (courseId, courseName)
 VALUES
 (:id, :name)';
 $statement = $db->prepare($query);
 $statement->bindValue(':id', $course_id);
 $statement->bindValue(':name', $course_name);
 $statement->execute();
 $statement->closeCursor();
 // Display the Product List page
 include('course_list.php');
}
?>
