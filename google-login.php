<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();

$client->setClientId("211181652280-4h9nbrjo0rums3nm3elflmh90ia5kfv5.apps.googleusercontent.com");
$client->setClientSecret("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");

$client->setRedirectUri("http://localhost/IS35126Group1/google-callback.php");

$client->addScope("email");
$client->addScope("profile");

header("Location: " . $client->createAuthUrl());
exit();
?>