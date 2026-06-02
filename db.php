<?php

$url = getenv("MYSQL_PUBLIC_URL");

if (!$url) {
    die("Database connection failed: MYSQL_PUBLIC_URL is missing");
}

$parts = parse_url($url);

$host = $parts["host"];
$user = $parts["user"];
$password = $parts["pass"];
$database = ltrim($parts["path"], "/");
$port = $parts["port"];

try {
    $conn = new PDO(
        "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4",
        $user,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
