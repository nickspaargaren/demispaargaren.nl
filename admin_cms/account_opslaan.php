<?php
require_once("sessie.php");
$cms_pagina_titel = 'Account Opslaan..';
include_once("../instellingen.php");

// element updaten ----------
if ($_POST['gebruikersnaam'] == NULL || $_POST['wachtwoord'] == NULL) { // als de gebruikersnaam of het wachtwoord leeg is
	header('Location: account.php');
	exit;
} else { // als de velden gevuld zijn updaten

	$statement = $pdo->prepare(
		"UPDATE users SET
		username = :username,
		password = :password,
		firstname = :firstname,
		lastname = :lastname,
		email = :email,
		laatst_bewerkt = '$day $date $year $time'
		WHERE id = :id"
	);

	$statement->execute([
		':username' => $_POST['gebruikersnaam'],
		':password' => password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT),
		':firstname' => $_POST['voornaam'],
		':lastname' => $_POST['achternaam'],
		':email' => $_POST['email'],
		':id' => $id,
	]);
}

header('Location: account.php');
