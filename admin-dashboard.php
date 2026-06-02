<?php
session_start();

if (!isset($_SESSION['user_id']) || 
    !isset($_SESSION['role']) || 
    $_SESSION['role'] !== 'admin' || 
    !isset($_SESSION['otp_verified']) || 
    $_SESSION['otp_verified'] !== true) {
    
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h1>Welcome Admin Dashboard</h1>

<p>Hello, <?php echo $_SESSION['name']; ?></p>
<p>Your role is: <?php echo $_SESSION['role']; ?></p>

<a href="logout.php">Logout</a>

</body>
</html>
