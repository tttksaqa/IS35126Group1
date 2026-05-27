<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Course Enrollment Form</h2>

<form method="POST">

    <label>Select Course:</label><br>
    <select name="course" required>
        <option value="">-- Select Course --</option>
        <option value="Web Security">Web Security</option>
        <option value="Database Systems">Database Systems</option>
        <option value="Networking">Networking</option>
    </select>

    <br><br>

    <button type="submit" name="enroll">Enroll</button>

</form>

<?php
if (isset($_POST['enroll'])) {
    $student_id = $_SESSION['user_id'];
    $course = htmlspecialchars($_POST['course']);

    echo "Enrollment Successful for: " . $course;
}
?>

<br><br>
<a href="dashboard.php">Back to Dashboard</a>