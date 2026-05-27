<?php
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {

    session_unset();
    session_destroy();

    header("Location: login.php");
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true) {
     header("Location: otp.php");
     exit();
}
?>

<h2>Welcome to Student Management Portal</h2>

<p>Hello, <?php echo htmlspecialchars($_SESSION['name']); ?></p>

<p>Your role is: <?php echo htmlspecialchars($_SESSION['role']); ?></p>

<a href="logout.php">Logout</a>