<?php
require_once "connection.php";

$sql = "INSERT INTO subject(code,description,semester,year,course) 
    VALUES ('". $_POST['code'] ."','" . $_POST['description'] . "','" . $_POST['semester'] . "','" . $_POST['year'] . "','" . $_POST['course'] . "')";

if($conn->query($sql)) {
    die(header('location:subjects.php'));
} else {
    echo "<p style='color: red;'>Failed to insert the record</p>";
}

echo "<a href='./'>Go back</a>";?>