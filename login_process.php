<?php
session_start();

include 'db.php';

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

if ($_SESSION['login_attempts'] >= 5) {
    die("Too many failed login attempts.");
}

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {

        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        $otp = rand(100000, 999999);
        $_SESSION['otp_code'] = $otp;
        $_SESSION['otp_verified'] = false;

        echo "Your OTP code is: " . $otp;
        echo "<br><a href='otp.php'>Enter OTP</a>";
        exit();

    } else {
        $_SESSION['login_attempts']++;
        echo "Wrong Password";
    }

} else {
    echo "User Not Found";
}
?>

