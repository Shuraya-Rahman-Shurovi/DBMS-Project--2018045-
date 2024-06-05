<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $courseID = $_POST['course_id'];
    $courseName = $_POST['course_name'];
    $credits = $_POST['credits'];

    $sql = "INSERT INTO Courses (CourseID, CourseName, Credits) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi", $courseID, $courseName, $credits);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
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
                    <li><a href="add_course.php" class="current">Add Course</a></li>
                    <li><a href="add_class.php">Add Class</a></li>
                    <li><a href="record_attendance.php">Record Attendance</a></li>
                    <li><a href="view_attendance.php">View Attendance</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Add Course</h2>
        <form action="add_course.php" method="post">
            <label for="course_id">Course ID:</label>
            <input type="text" name="course_id" id="course_id" required>
            
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" id="course_name" required>
            
            <label for="credits">Credits:</label>
            <input type="text" name="credits" id="credits">
            
            <input type="submit" value="Add Course">
        </form>
    </div>
</body>
</html>
