if ($_POST['otp'] == $_SESSION['otp_code']) {
    $_SESSION['otp_verified'] = true;

    if ($_SESSION['role'] == 'admin') {
        header("Location: admin-dashboard.php");
        exit();
    } else {
        header("Location: student-dashboard.php");
        exit();
    }
}
