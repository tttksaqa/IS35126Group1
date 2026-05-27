<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] != 'lecturer') {
    die("Access Denied");
}
?>

<h2>Lecturer Page</h2>

<p>Welcome Lecturer</p>