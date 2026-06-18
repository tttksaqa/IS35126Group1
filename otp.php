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

        $role = strtolower($_SESSION['role']);

        if ($role == 'admin') {
            header("Location: admin-dashboard.php");
            exit();
        } elseif ($role == 'lecturer') {
            header("Location: lecturer-dashboard.php");
            exit();
        } elseif ($role == 'student') {
            header("Location: student-dashboard.php");
            exit();
        }

    } else {
        echo "Invalid OTP";
    }
}
?>

<h2>Enter OTP</h2>

<p><strong>Your OTP Code:</strong> <?php echo $_SESSION['otp_code']; ?></p>

<form method="POST">
    <label>OTP Code:</label><br>
    <input type="text" name="otp" required><br><br>
    <button type="submit">Verify OTP</button>
</form>
