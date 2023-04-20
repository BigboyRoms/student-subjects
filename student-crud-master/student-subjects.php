<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENTS</title>
</head>

<body>
    <?php 
       require_once "connection.php";
    include_once "menu.php"; 

    $id = $_GET['id'];
    $sql="SELECT * FROM students WHERE id = '$id'";
    $result = $conn->query($sql);
    $student_info = $result->fetch_assoc();
    ?>
    <div>
        STUDENT: <?php echo $student_info['student_Lname']." ". $student_info['student_Fname']?> <br>
        GENDER: <?php echo $student_info['gender']?><br>
        YEAR LEVEL: <?php echo $student_info['year_level']?> <br>
        COURSE: <?php echo $student_info['course']?> <br>
        SEMESTER: <?php echo $student_info['semester']?> <br><br>
        CURRENT SUBJECTS:
        <form action="delete-student-subject.php" method="post">
            <input type="hidden" name="student_id" value="<?php echo $student_info['id'] ?>">
            <table border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>SUBJECT CODE</th>
                        <th>SUBJECT DESCRIPTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql="SELECT students_subjects.subject_id,subject.code,subject.description  FROM students_subjects LEFT JOIN subject on students_subjects.subject_id = subject.id WHERE student_id = '$id'";
                    $result = $conn->query($sql);
                    $result_check = mysqli_num_rows($result);
                    if ($result_check>0) {
                        while ($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><input type="checkbox" name="subject_id[]" value="<?php echo $row['subject_id'] ?>"></td>
                        <td><?php echo $row['code'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "NO data";
                    }
                    ?>
                </tbody>
            </table>
            <button>DELETE CHECKED SUBJECTS</button>
        </form>

        <hr>

        AVAILABLE SUBJECTS:
        <form action="add-student-subect.php" method="post">

            <input type="hidden" name="student_id" value="<?php echo $student_info['id'] ?>">
            <table border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>SUBJECT CODE</th>
                        <th>SUBJECT DESCRIPTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $year_level = $student_info['year_level'] ;
                        $course = $student_info['course'] ;
                        $semester = $student_info['semester'] ;
                        $sql = "SELECT * FROM subject
                            WHERE year = '$year_level' 
                            AND course = '$course' 
                            AND semester = '$semester' 
                            AND id NOT IN (SELECT subject_id FROM students_subjects WHERE student_id = '$id')";

                        $result = $conn->query($sql);
                        $result_check = mysqli_num_rows($result);
                        

                        if ($result_check>0) {
                            while ($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><input type="checkbox" name="subject[]" value="<?php echo $row['id'] ?>"></td>
                        <td><?php echo $row['code'] ?></td>
                        <td><?php echo $row['description'] ?></td>

                    </tr>
                    <?php
                            }
                        } else {
                            echo "NO data";
                        }
                    

                    
                    ?>

                </tbody>
            </table>


            <button>ADD CHECKED SUBJECTS</button>
        </form>
    </div>
</body>

</html>