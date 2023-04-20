<?php
require_once "connection.php";

$sql = "DELETE FROM subject WHERE id=" . $_GET['id'];

if($conn->query($sql)) {
    die(header('location:subjects.php'));
} else {
    echo "<p style='color: red;'>Failed to delete the record</p>";
}

echo "<a href='subjects.php'>Go back</a>";?>