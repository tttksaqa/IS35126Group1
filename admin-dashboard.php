<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<h1>Welcome Admin Dashboard</h1>

<p>Hello, <?php echo $_SESSION['name']; ?></p>
<p>Your role is: <?php echo $_SESSION['role']; ?></p>

<a href="logout.php">Logout</a>
