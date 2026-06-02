<?php

$url = getenv("DATABASE_URL");

if (!$url) {
    die("Database connection failed: DATABASE_URL is missing");
}

$parts = parse_url($url);

$host = $parts["host"];
$user = $parts["user"];
$password = $parts["pass"];
$database = ltrim($parts["path"], "/");
$port = $parts["port"];

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>
