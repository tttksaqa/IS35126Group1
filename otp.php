<?php
session_start();

if (!isset($_SESSION['otp_code'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['verify'])) {
    $entered_otp = $_POST['otp'];

    if ($entered_otp == $_SESSION['otp_code']) {
        $_SESSION['otp_verified'] = true;
        unset($_SESSION['otp_code']);

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Wrong OTP code.";
    }
}
?>

<h2>OTP Verification</h2>

<p>Enter the OTP code:</p>

<form method="POST">
    <input type="text" name="otp" required>
    <button type="submit" name="verify">Verify OTP</button>
</form>