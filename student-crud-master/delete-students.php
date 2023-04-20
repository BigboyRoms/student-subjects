<?php
require_once "connection.php";

$sql = "DELETE FROM students WHERE id=" . $_GET['id'];

if($conn->query($sql)) {
    die(header('location:students.php'));
} else {
    echo "<p style='color: red;'>Failed to delete the record</p>";
}

echo "<a href='students.php'>Go back</a>";?>