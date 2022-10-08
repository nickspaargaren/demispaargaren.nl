<?php
require_once("sessie.php");
$cms_pagina_titel = 'Account Opslaan..';
include_once("../instellingen.php");

$accountid = $_GET["accountid"];

if ($accountid != 0) {
	$query = $pdo->prepare("DELETE FROM users WHERE id = :id");
	$query->execute([
		':id' => $accountid
	]);
}

header('Location: account.php');

?>
