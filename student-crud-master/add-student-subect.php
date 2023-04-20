<?php
require_once "connection.php";

$student_id = $_POST['student_id'];



foreach( $_POST['subject'] as $subjects) { 
    
        $query = "INSERT INTO students_subjects(student_id, subject_id) VALUES('$student_id', '$subjects')";
        $sql = mysqli_query($conn, $query);
    
  }

if ($sql === TRUE) {
    die(header('location:students.php'));

}else{
    echo "<p style='color: red;'>Failed to insert the record</p>";
}

echo "<a href='./'>Go back</a>";?>
