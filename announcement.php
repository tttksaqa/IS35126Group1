<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'lecturer') {
    die("Access Denied");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $announcement = htmlspecialchars($_POST['announcement']);

    echo "<h2>Announcement Posted</h2>";
    echo "<p>$announcement</p>";
    echo "<a href='lecturer-dashboard.php'>Back to Dashboard</a>";
}
?>
