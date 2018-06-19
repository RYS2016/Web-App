<?php
// Get the product data
$courseID = filter_input(INPUT_POST, 'courseID');
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$email = filter_input(INPUT_POST, 'email');

// Validate inputs
if ($courseID == null || $courseID == false ||
        $firstName == null || $name == null || $email == null || $email == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'INSERT INTO students
                 (courseID, firstName, lastName, email)
              VALUES
                 (:courseID, :firstName, :LastName, :email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $courseID);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('example.php');
}
?>