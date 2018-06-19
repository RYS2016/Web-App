PDO – Course/Student Manager. Create the necessary PHP files using PDO in order to provide the following functionality. 
The application maintains a list of courses. Each course has a list of students enrolled in that course. The database structure and 
initial data used for the application is shown at the end of this document. The home page, index.php, shows a list of courses. 
The students enrolled in the first course are shown as well. The home page has links for deleting a student, adding a student, 
and a link to manage the list of courses. 
 
Selecting a different course shows the same home page along with the request parameter corresponding to the selected course_id.
 
 
The List Courses link shows the course_list.php page. The current set of courses is shown. The page also includes a form 
for adding a new course. The user can also go the home page by clicking the List Students link. 
 
The user can enter new course information and submit the form (use POST) by clicking the Add Course button.  
 
 
The add_course.php script handles the above form submission. The result includes the contents of course_list.php. Note 
that the courses are always displayed in the ascending order of their course id.
 
The List Students link shows the home page, index.php. The newly added course has no students. 
 
The Add Student link shows the add_student_form.php page. The form shows a drop-down list of courses, and the fields for entering the 
first name, last name, and email of the student. The form is submitted with POST.  
 
The above form submission is handled by add_student.php. The result includes the home page, showing the course selection and the 
resulting students in that selected course. 
 
The Delete button deletes the corresponding student from the database. 
The delete action is handled by delete_student.php. After the student is deleted, the result includes the home page with the current 
course. 
 
The following should be used for connecting to the database, database.php.
 
