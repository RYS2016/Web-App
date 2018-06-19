<?php
// Get the category data
$courseID = filter_input(INPUT_POST, 'courseID');
$courseName = filter_input(INPUT_POST, 'courseName');

// Validate inputs
if ($courseName == null && $courseID == null) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'INSERT INTO sk_courses
                 (courseID, courseName)
              VALUES
                 (:courseID,
                  :courseName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $courseID);
    $statement->bindValue(':courseName', $courseName);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('course_list.php');
}
?>