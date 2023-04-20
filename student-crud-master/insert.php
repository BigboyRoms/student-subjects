<?php
require_once "connection.php";

$sql = "INSERT INTO students(student_Lname,student_Fname,gender,year_level,course,	semester) 
    VALUES ('". $_POST['student_Lname'] ."','" . $_POST['student_Fname'] . "','" . $_POST['gender'] . "','" . $_POST['year_level'] . "','" . $_POST['course'] . "','" . $_POST['semester'] . "')";

if($conn->query($sql)) {
    die(header('location:students.php'));
} else {
    echo "<p style='color: red;'>Failed to insert the record</p>";
}

echo "<a href='./'>Go back</a>";?>