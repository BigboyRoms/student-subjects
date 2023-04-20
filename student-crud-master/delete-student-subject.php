<?php
require('connection.php');

$student_id = $_POST['student_id'];
foreach( $_POST['subject_id'] as $id) { 
    $query = "DELETE FROM students_subjects WHERE student_id=$student_id AND subject_id='$id'";
    $sql = mysqli_query($conn, $query);
}
if ($sql === TRUE) {
    die(header('location:students.php'));
}else{ 
    echo "<p style='color: red;'>Failed to insert the record</p>";
}

echo "<a href='./'>Go back</a>";?>