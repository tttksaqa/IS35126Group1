<?php
session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

include 'db.php';
?>

<?php include 'db.php'; ?>

<h2>Student Registration</h2>

<form method="POST">

    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

    <button type="submit" name="register">Register</button>

</form>

<?php

if (isset($_POST['register'])) {

if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("CSRF token validation failed");
}

    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $role = "student";

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssss", $name, $email, $password, $role);

    if ($stmt->execute()) {

        echo "Registration Successful!";

    } else {

        echo "Registration Failed.";

    }
}
?>