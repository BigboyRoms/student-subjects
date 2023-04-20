<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENTS</title>
</head>
<body>
<?php require_once "connection.php" ?><?php include_once "menu.php"; ?>
    <form action="insert.php"method="POST">
        
        <h1>ENTER STUDENT DETAILS</h1>
        <label name="student_Fname">
            ENTER FIRST NAME:
            <input name="student_Fname" type="text">
        </label><br>
        <label >
            ENTER LAST NAME:
            <input name="student_Lname" type="text">
        </label><br>
        <div>
            <label  name="gender" value="male">MALE <input type="radio" name="gender"value="male"></label>
            <label name="gender" value="female">FEMALE <input type="radio" name="gender" value="female"></label>
        </div>
        <label for="">
            YEAR LEVEL: 
            <select name="year_level" id="">
                <option value="1ST YEAR">1ST YEAR</option>
                <option value="2ND YEAR">2ND YEAR</option>
                <option value="3RD YEAR">3RD YEAR</option>
                <option value="4TH YEAR">4TH YEAR</option>
            </select>
        </label><br>
        <label for="">
            COURSE: 
            <select name="course" id="">
                <option value="BSIT">BSIT</option>
                <option value="BSED">BSED</option>
                <option value="BSBA">BSBA</option>
                <option value="BEED">BEED</option>
            </select>
        </label><br>
        <label for="">
            SEMESTER: 
            <select name="semester" id="">
                <option value="1ST">1ST</option>
                <option value="2ND">2ND</option>
            </select>
        </label>
        <hr>
        <button type="submit">Submit</button>
    </form>
    <div>
    <table border="1">
    <thead>
    <tr>
    <th>ID</th>
    <th>STUDENT NAME</th>
    <th>GENDER</th>
    <th>YEAR</th>
    <th>COURSE</th>
    <th>SEMESTER</th>
    <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
    <tbody>
    <?php
    require_once "connection.php";
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['student_Fname']. " " . $row['student_Lname']; ?></td>
  
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['year_level']; ?></td>
        <td><?php echo $row['course']; ?></td>
        <td><?php echo $row['semester']; ?></td>
        <td>
            <a href="delete-students.php?id=<?php echo $row['id'];?>">Delete</a>
            <a href="edit-students.php?id=<?php echo $row['id']; ?>&student_Fname=<?php echo $row['student_Fname']; ?>&student_Lname=<?php echo $row['student_Lname']; ?>&gender=<?php echo $row['gender']; ?>&year_level=<?php echo $row['year_level']; ?>&student_Lname=<?php echo $row['student_Lname']; ?>&course=<?php echo $row['course']; ?>&semester=<?php echo $row['semester']; ?>">Edit</a>
            <a href="student-subjects.php?id=<?php echo $row['id']; ?>"><button>ADD SUBJECTS</button></a>
        </td>
        </tr>
        <?php
        } // end of while loop...
    } else {
        echo "<tr><td colspan='4' style='text-align: center;'>No results found.</td></tr>";
    }
    ?>
    </tbody>
    </table>
    </div>
</body>
</html>