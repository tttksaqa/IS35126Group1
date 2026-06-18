<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'lecturer') {
    die("Access Denied");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student = htmlspecialchars($_POST['student_name']);
    $course = htmlspecialchars($_POST['course']);
    $grade = htmlspecialchars($_POST['grade']);

    echo "<h2>Grade Saved Successfully</h2>";
    echo "<p>Student: $student</p>";
    echo "<p>Course: $course</p>";
    echo "<p>Grade: $grade</p>";

    echo "<br><a href='lecturer-dashboard.php'>Back to Dashboard</a>";
}
?>
