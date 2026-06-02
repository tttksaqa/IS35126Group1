<?php
session_start();

if (!isset($_SESSION['otp_code'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $entered_otp = $_POST['otp'];

    if ($entered_otp == $_SESSION['otp_code']) {

        $_SESSION['otp_verified'] = true;

        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            header("Location: admin-dashboard.php");
            exit();
        } else {
            header("Location: student-dashboard.php");
            exit();
        }

    } else {
        echo "Invalid OTP";
    }
}
?>

<h2>Enter OTP</h2>

<form method="POST">
    <label>OTP Code:</label><br>
    <input type="text" name="otp" required><br><br>
    <button type="submit">Verify OTP</button>
</form>
