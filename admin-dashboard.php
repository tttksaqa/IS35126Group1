<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die("Access Denied");
}
?>



<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h1>Welcome Admin Dashboard</h1>

<p>You are successfully logged in as Admin.</p>

<a href="logout.php">Logout</a>

</body>
</html>