<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student') {
    die("Access Denied");
}
?>


<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>
<body>

<h1>Welcome Student Dashboard</h1>

<p>You are successfully logged in as Student.</p>

<a href="logout.php">Logout</a>

</body>
</html>