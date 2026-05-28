<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();

$client->setClientId("211181652280-mmom61lu3mfi2jn6hhjq0qft13n0tgih.apps.googleusercontent.com");
$client->setClientSecret("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");

$client->setRedirectUri("https://is35126group1-production.up.railway.app/google-callback.php");

$client->addScope("email");
$client->addScope("profile");

header("Location: " . $client->createAuthUrl());
exit();
?>
