<?php require_once 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance System</title>
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
                    <li><a href="record_attendance.php">Record Attendance</a></li>
                    <li><a href="view_attendance.php">View Attendance</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2 align="center">Welcome to the Student Attendance System</h2>
        <p align="center">Use the navigation to manage students, courses, classes, and attendance.</p>
    </div>
</body>
</html>
