<?php
require_once("sessie.php");
$cms_pagina_titel = 'Account Opslaan..';
include_once("../instellingen.php");

if ($_POST['gebruikersnaam_alle'] == NULL || $_POST['wachtwoord_alle'] == NULL) {
	header('Location: account.php');
	exit;
}

$wachtwoord_hashed = password_hash($_POST['wachtwoord_alle'], PASSWORD_DEFAULT);

if ($_GET["nieuw"] != 1) { // als er een bestaand account word geupdate

	$query = $pdo->prepare("UPDATE users SET
		username =  :username,
		password =  :password,
		laatst_bewerkt = '$day $date $year $time'
		WHERE id = :id"
	);
	$query->execute([
		':username' => $_POST['gebruikersnaam_alle'],
		':password' => $wachtwoord_hashed,
		':id' => $_GET["accountid"],
	]);

} else { // als er een nieuw account wordt aangemaakt

	$query = $pdo->prepare("INSERT INTO users SET username = :username, password = :password, firstname = :firstname, activated = '1', laatst_bewerkt = '$day $date $year $time'");
	$query->execute([
		':username' => $_POST['gebruikersnaam_alle'],
		':password' => $wachtwoord_hashed,
		':firstname' => $_POST['gebruikersnaam_alle'],
	]);

}

header('Location: account.php');
