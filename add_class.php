<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $classID = $_POST['class_id'];
    $courseID = $_POST['course_id'];
    $teacherName = $_POST['teacher_name'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];

    $sql = "INSERT INTO Classes (ClassID, CourseID, Teacher_Name, Semester, Year) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssi", $classID, $courseID, $teacherName, $semester, $year);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Student Attendance System</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="add_student.php">Add Student</a></li>
                    <li><a href="add_course.php">Add Course</a></li>
                    <li><a href="add_class.php" class="current">Add Class</a></li>
                    <li><a href="record_attendance.php">Record Attendance</a></li>
                    <li><a href="view_attendance.php">View Attendance</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Add Class</h2>
        <form action="add_class.php" method="post">
            <label for="class_id">Class ID:</label>
            <input type="text" name="class_id" id="class_id" required>

            <label for="course_id">Course ID:</label>
            <select name="course_id" id="course_id" required>
                <?php
                $result = $mysqli->query("SELECT * FROM Courses");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['CourseID'] . "'>" . $row['CourseName'] . "</option>";
                }
                ?>
            </select>

            <label for="teacher_name">Teacher Name:</label>
            <input type="text" name="teacher_name" id="teacher_name" required>
            
            <label for="semester">Semester:</label>
            <input type="text" name="semester" id="semester" required>
            
            <label for="year">Year:</label>
            <input type="text" name="year" id="year" required>
            
            <input type="submit" value="Add Class">
        </form>
    </div>
</body>
</html>
