<?php
session_start();

echo "Role = " . $_SESSION['role'];
exit();
?>

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'lecturer') {
    die("Access Denied");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lecturer Dashboard</title>
</head>
<body>

<h1>Welcome Lecturer Dashboard</h1>

<p>You are successfully logged in as Lecturer.</p>

<hr>

<h2>Create Announcement</h2>

<form method="POST" action="announcement.php">
    <label>Announcement:</label><br>
    <textarea name="announcement" rows="4" cols="50" required></textarea>
    <br><br>
    <button type="submit">Post Announcement</button>
</form>

<hr>

<h2>Manage Student Grades</h2>

<form method="POST" action="grades.php">

    Student Name:<br>
    <input type="text" name="student_name" required>
    <br><br>

    Course:<br>
    <select name="course">
        <option value="IS351">IS351</option>
        <option value="IS333">IS333</option>
        <option value="IS221">IS221</option>
    </select>
    <br><br>

    Grade:<br>
    <input type="text" name="grade" required>
    <br><br>

    <button type="submit">Save Grade</button>

</form>

<hr>

<a href="logout.php">Logout</a>

</body>
</html>
