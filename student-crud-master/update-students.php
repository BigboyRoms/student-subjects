<?php
require_once "connection.php";

$sql = "UPDATE students SET student_Fname='". $_POST['student_Fname'] ."', student_Lname='". $_POST['student_Lname'] ."', gender='". $_POST['gender'] ."' , year_level='". $_POST['year_level'] ."', course='". $_POST['course'] ."' , semester='". $_POST['semester'] ."' WHERE id=" . $_POST['id'];

if($conn->query($sql)) {
    die(header('location:students.php'));
} else {
    echo "<p style='color: red;'>Failed to update the record</p>";
}

echo "<a href='./'>Go back</a>";?>