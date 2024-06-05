<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentID = $_POST['student_id'];
    $name = $_POST['name'];
    $contactNo = $_POST['contact_no'];
    $dateOfBirth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $enrollmentDate = $_POST['enrollment_date'];

    $sql = "INSERT INTO Students (StudentID, Name, ContantNo, DateOfBirth, Gender, EnrollmentDate) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssss", $studentID, $name, $contactNo, $dateOfBirth, $gender, $enrollmentDate);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Student Attendance System</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="add_student.php" class="current">Add Student</a></li>
                    <li><a href="add_course.php">Add Course</a></li>
                    <li><a href="add_class.php">Add Class</a></li>
                    <li><a href="record_attendance.php">Record Attendance</a></li>
                    <li><a href="view_attendance.php">View Attendance</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Add Student</h2>
        <form action="add_student.php" method="post">
            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" id="student_id" required>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="contact_no">Contact No:</label>
            <input type="text" name="contact_no" id="contact_no">

            <label for="date_of_birth">Date of Birth:</label>
            <input type="text" name="date_of_birth" id="date_of_birth">
            
            <label for="gender">Gender:</label>
            <input type="text" name="gender" id="gender">
            
            <label for="enrollment_date">Enrollment Date:</label>
            <input type="text" name="enrollment_date" id="enrollment_date">
            
            <input type="submit" value="Add Student">
        </form>
    </div>
</body>
</html>
