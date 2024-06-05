<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentID = $_POST['student_id'];
    $classID = $_POST['class_id'];
    $date = $_POST['date'];
    $semester = $_POST['semester'];
    $attendanceStatus = $_POST['attendance_status'];

    $sql = "INSERT INTO Attendance (Date, Semester, StudentID, ClassID, Attendance_Status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssss", $date, $semester, $studentID, $classID, $attendanceStatus);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Attendance</title>
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
                    <li><a href="add_class.php">Add Class</a></li>
                    <li><a href="record_attendance.php" class="current">Record Attendance</a></li>
                    <li><a href="view_attendance.php">View Attendance</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Record Attendance</h2>
        <form action="record_attendance.php" method="post">
            <label for="student_id">Student:</label>
            <select name="student_id" id="student_id" required>
                <?php
                $result = $mysqli->query("SELECT * FROM Students");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['StudentID'] . "'>" . $row['Name'] . "</option>";
                }
                ?>
            </select>

            <label for="class_id">Class:</label>
            <select name="class_id" id="class_id" required>
                <?php
                $result = $mysqli->query("SELECT * FROM Classes");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ClassID'] . "'>" . $row['ClassID'] . "</option>";
                }
                ?>
            </select>

            <label for="date">Date:</label>
            <input type="text" name="date" id="date" required>

            <label for="semester">Semester:</label>
            <input type="text" name="semester" id="semester" required>
            
            <label for="attendance_status">Attendance Status:</label>
            <input type="text" name="attendance_status" id="attendance_status" required>
            
            <input type="submit" value="Record Attendance">
        </form>
    </div>
</body>
</html>
