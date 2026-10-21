<?php

session_start();
include_once("../instellingen.php");

if (!csrf_valid()) {
    http_response_code(403);
    exit;
}

require('head.php');

$statement = $pdo->prepare("INSERT INTO formulier SET
	naam = :naam,
	email = :email,
	bericht = :bericht,
	tijd = :tijd,
	ip = :ip,
	gelezen = :gelezen");

$statement->execute([
    ':naam' => $_POST['naam'],
    ':email' => $_POST['email'],
    ':bericht' => $_POST['bericht'],
    ':tijd' => date('Y-m-d H:i:s'),
    ':ip' => $_SERVER["REMOTE_ADDR"],
    ':gelezen' => '0',
]);

// eventueel email sturen naar de accounts?


echo "Bedankt voor je bericht!";
