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
} else {
    die("Invalid role");
}
