<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';
include 'db.php';

$client = new Google_Client();

$client->setClientId("211181652280-mmom61lu3mfi2jn6hhjq0qft13n0tgih.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("https://is35126group1-production.up.railway.app/google-callback.php");

if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {

        $client->setAccessToken($token['access_token']);

        $google_service = new Google_Service_Oauth2($client);
        $google_user = $google_service->userinfo->get();

        $name = $google_user->name;
        $email = $google_user->email;
        $role = "student";

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $password = password_hash("google_login", PASSWORD_DEFAULT);

            $insert = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
            $insert->execute([$name, $email, $password, $role]);

            $user_id = $conn->lastInsertId();
        } else {
            $user_id = $user['id'];
            $name = $user['name'];
            $role = $user['role'];
        }

        $_SESSION['user_id'] = $user_id;
        $_SESSION['name'] = $name;
        $_SESSION['role'] = $role;
        $_SESSION['otp_verified'] = true;

        $role_lower = strtolower($role);

        if ($role_lower == 'admin') {
            header("Location: admin-dashboard.php");
            exit();
        } elseif ($role_lower == 'lecturer') {
            header("Location: lecturer-dashboard.php");
            exit();
        } else {
            header("Location: student-dashboard.php");
            exit();
        }
    }
}

echo "Google Login Failed";
?>
          
