<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_name = $_POST['student_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $stmt = $pdo->prepare("INSERT INTO enrollments (student_name, email, course)
                           VALUES (?, ?, ?)");

    $stmt->execute([$student_name, $email, $course]);

    echo "Enrollment Successful";
}
?>