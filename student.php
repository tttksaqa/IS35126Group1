<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] != 'student') {
    die("Access Denied");
}
?>

<h2>Student Page</h2>

<p>Welcome Student</p>