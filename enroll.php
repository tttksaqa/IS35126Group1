<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student') {
    die("Access Denied");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = htmlspecialchars($_POST['course']);

    echo "<h2>Enrollment Submitted</h2>";
    echo "<p>You have successfully submitted enrollment for: <strong>$course</strong></p>";
    echo "<a href='student-dashboard.php'>Back to Dashboard</a>";
}
?>
