<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student') {
    die("Access Denied");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>
<body>

<h1>Welcome Student Dashboard</h1>
<p>You are successfully logged in as Student.</p>

<hr>

<h2>Available Courses</h2>
<ul>
    <li>IS351 - Data & Information Security</li>
    <li>IS333 - Project Management</li>
    <li>IS221 - Database Systems</li>
</ul>

<hr>

<h2>Course Enrollment Form</h2>
<form method="POST" action="enroll.php">
    <label>Select Course:</label><br>
    <select name="course" required>
        <option value="IS351">IS351 - Data & Information Security</option>
        <option value="IS333">IS333 - Project Management</option>
        <option value="IS221">IS221 - Database Systems</option>
    </select><br><br>

    <button type="submit">Submit Enrollment</button>
</form>

<hr>

<h2>Lecturer Announcements</h2>
<ul>
    <li>Welcome to Semester 1, 2026.</li>
    <li>IS351 Project submission is due soon.</li>
    <li>Please check Moodle for weekly updates.</li>
</ul>

<hr>

<a href="logout.php">Logout</a>

</body>
</html>
