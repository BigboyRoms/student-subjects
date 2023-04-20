<?php
require_once "connection.php";

$sql = "UPDATE subject SET code='". $_POST['code'] ."', description='". $_POST['description'] ."' , semester='". $_POST['semester'] ."',  year='". $_POST['year'] ."',course='". $_POST['course'] ."' WHERE id=" . $_POST['id'];

if($conn->query($sql)) {
    die(header('location:subjects.php'));
} else {
    echo "<p style='color: red;'>Failed to update the record</p>";
}

echo "<a href='./'>Go back</a>";?>