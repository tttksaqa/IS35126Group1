<?php
session_start();

if (!isset($_SESSION['role']) || strtolower($_SESSION['role']) != 'lecturer') {
    die("Access Denied");
}
?>

<h1>Welcome Lecturer Dashboard</h1>

<h3>Lecturer Menu</h3>
<ul>
    <li>Manage Courses</li>
    <li>Manage Student Grades</li>
    <li>Create Announcements</li>
    <li><a href="logout.php">Logout</a></li>
</ul>


  
