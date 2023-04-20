<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBJECTS</title>
</head>
<body><?php include_once "menu.php"; ?>
<?php include_once "connection.php"; ?>
    <form action="add-subjects.php" method="POST">
        <h1>ENTER SUBJECT DETAILS</h1>
        <label for="">
            SUBJECT CODE:
            <input name="code"type="text">
        </label><br>
      
        <label for="">
        SUBJECT DESCRIPTION:
            <input name="description"type="text">
        </label><br>
        <label for="">
            YEAR LEVEL: 
            <select name="year" id="">
                <option value="1ST YEAR">1ST YEAR</option>
                <option value="2ND YEAR">2ND YEAR</option>
                <option value="3RD YEAR">3RD YEAR</option>
                <option value="4TH YEAR">4TH YEAR</option>
            </select>
        </label><br> <label for="">
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
        </label><hr>
        <button type="submit">Submit</button>
    </form>   
    <hr>
    <table border="1">
    <thead>
    <tr>
    <th>ID</th>
    <th>SUBJECT CODE</th>
    <th>SUBJECT DESCRIPTION</th>
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
    $sql = "SELECT * FROM subject";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['code'];?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['year']; ?></td>
        <td><?php echo $row['course']; ?></td>
        <td><?php echo $row['semester']; ?></td>
        <td>
            <a href="delete-subjects.php?id=<?php echo $row['id'];?>">Delete</a>
            <a href="edit-subjects.php?id=<?php echo $row['id']; ?>&code=<?php echo $row['code']; ?>&description=<?php echo $row['description']; ?>&year=<?php echo $row['year']; ?>&course=<?php echo $row['course']; ?>&semester=<?php echo $row['semester']; ?>">Edit</a>
            
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
</body>
</html>