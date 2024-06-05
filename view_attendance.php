


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
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
                    <li><a href="view_attendance.php" class="current">View Attendance</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>View Attendance</h2>
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Class ID</th>
                    <th>Date</th>
                    <th>Semester</th>
                    <th>Attendance Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database configuration
                define('DB_SERVER', 'localhost');
                define('DB_USERNAME', 'root');
                define('DB_PASSWORD', '');
                define('DB_NAME', 'attendance_system');
                
                // Connect to the database
                $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                
                // Check the connection
                if ($mysqli === false) {
                    die("ERROR: Could not connect. " . $mysqli->connect_error);
                }
                
                
                $result = $mysqli->query("
                    SELECT 
                        Students.Name AS StudentName, 
                        Attendance.ClassID, 
                        Attendance.Date, 
                        Attendance.Semester, 
                        Attendance.Attendance_Status 
                    FROM 
                        Attendance 
                    JOIN 
                        Students 
                    ON 
                        Attendance.StudentID = Students.StudentID
                ");

                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . htmlspecialchars($row['StudentName']) . "</td>
                            <td>" . htmlspecialchars($row['ClassID']) . "</td>
                            <td>" . htmlspecialchars($row['Date']) . "</td>
                            <td>" . htmlspecialchars($row['Semester']) . "</td>
                            <td>" . htmlspecialchars($row['Attendance_Status']) . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Error: " . $mysqli->error . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

