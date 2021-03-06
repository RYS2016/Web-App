<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM sk_courses
                       ORDER BY courseID';
$statement = $db->prepare($query);
$statement->execute();
$sk_courses = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Course/Student Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Course Manager</h1></header>
<main>
    <h1>Course List</h1>
    <table>
        <tr>
            <th>Name</th>
        </tr>
        
        <!-- add code for the rest of the table here -->
        <?php foreach ($sk_courses as $course) : ?>
            <tr><td><?php echo $course['courseName']; ?></td>
                
            </tr>
        <?php endforeach; ?>
    
    </table>
    <p>
    <h2>Add Course</h2>
    
    <!-- add code for the form here -->
    <form action="add_course.php" method="post"
              id="add_course_form">

        <label>Course Id:</label>
        <input type="text" name="courseID"><br>
        
        <label>Coursec Name:</label>
        <input type="text" name="courseName"><br>
         <p>
        
        <label>&nbsp;</label>
        <input type="submit" value="Add Course"><br>

    </form>
    
    <br>
    <p><a href="index.php">List Students</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Yarosalv Rykal, Inc.</p>
    </footer>
</body>
</html>