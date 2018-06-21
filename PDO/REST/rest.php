<?php
require('database.php');


$format = $_GET['format'];
$action = $_GET['action'];
$course_id = $_GET['course'];

if ($format = 'xml') {
    header('Content-Type: text/xml');
}else{
    header('Content-Type: text/json');
};

if ($action = 'courses') {
    $query = 'SELECT * FROM sk_courses';
    if ($format = 'json'){
        printf(json_encode($query));
    }else if($format = 'xml'){
        $xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?><Courses</Courses>");
            print($xml->asXML());
    }
};

 if ($action = 'students') {
     
     $queryStudents = 'SELECT * FROM sk_students 
     WHERE courseID = :course_id';
 } if ($format = 'json'){
       printf(json_encode($queryStudents));
    }else if($format = 'xml'){
        $xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?><Student></Student>");
        
        print($xml->asXML());
}


?>