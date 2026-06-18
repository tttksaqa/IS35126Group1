<?php
session_start();

if (!isset($_SESSION['role']) || strtolower($_SESSION['role']) != 'admin') {
    die("Access Denied");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h1>Welcome Admin Dashboard</h1>

<h3>Admin Menu</h3>

<ul>
    <li>Dashboard</li>
    <li>Manage Users</li>
    <li>Manage Courses</li>
    <li>View Reports</li>
    <li>System Settings</li>
    <li><a href="logout.php">Logout</a></li>
</ul>

<hr>

<h3>Manage Users</h3>
<p>Admin can add, edit, or remove student and lecturer accounts.</p>

<h3>Manage Courses</h3>
<p>Admin can create, update, or remove courses.</p>

</body>
</html>
