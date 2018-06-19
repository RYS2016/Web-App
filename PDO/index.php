<?php
require_once('database.php');

if (!isset($course_id)) {
    $course_id = filter_input(INPUT_GET, 'course_id');
    if ($course_id == NULL || $course_id == FALSE) {
        $course_id = 1;
    }
}

$queryCourse = 'SELECT * FROM sk_courses
                  WHERE courseID = :course_id';
$statement1 = $db->prepare($queryCourse);
$statement1->bindValue(':course_id', $course_id);
$statement1->execute();
$course = $statement1->fetch();
$course_name = $course['courseName'];
$statement1->closeCursor();


$query = 'SELECT * FROM sk_courses
                       ORDER BY courseID';
$statement = $db->prepare($query);
$statement->execute();
$sk_courses = $statement->fetchAll();
$statement->closeCursor();


$queryStudents = 'SELECT * FROM sk_students
                  WHERE courseID = :course_id
                  ORDER BY studentID';
$statement3 = $db->prepare($queryStudents);
$statement3->bindValue(':course_id', $course_id);
$statement3->execute();
$sk_students = $statement3->fetchAll();
$statement3->closeCursor();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Course/Students Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head> 

<body>
<header><h1>Course Manager</h1></header>
<main>
    <h1 align="center">Student List</h1>

    <aside>
        <h2>Courses</h2>
        <nav>
        <ul>
            <?php foreach ($sk_courses as $course) : ?>
            <li><a href="?course_id=<?php echo $course['courseID']; ?>">
                    <?php echo $course['courseName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>          
    </aside>

    <section>
        <h2><?php echo $course_name; ?></h2>
        <table align="center">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($sk_students as $student) : ?>
            <tr>
                <td><?php echo $student['firstName']; ?></td>
                <td><?php echo $student['lastName']; ?></td>
                <td><?php echo $student['email']; ?></td>
             
                <td><form action="delete_student.php" method="post">
                    <input type="hidden" name="student_id"
                           value="<?php echo $student['studentID']; ?>">
                    <input type="hidden" name="course_id"
                           value="<?php echo $student['courseID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_student_form.php">Add student</a></p>
        <p><a href="course_list.php">List courses</a></p>        
    </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Yaroslav Rykal, Inc.</p>
</footer>
</body>
</html>