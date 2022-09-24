<?php
session_start();
$cms_pagina_titel = 'Account Opslaan..';
include_once("../instellingen.php");

if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
	$usname = $_SESSION['username'];
} else {
	header('Location: index.php');
	exit;
}


// elementen ----------
$gebruikersnaam_invoer = clean_urlVar($_POST['gebruikersnaam']);
$wachtwoord_invoer = clean_urlVar($_POST['wachtwoord']);
$voornaam_invoer = clean_urlVar($_POST['voornaam']);
$achternaam_invoer = clean_urlVar($_POST['achternaam']);
$email_invoer = clean_urlVar($_POST['email']);


// element updaten ----------
if ($gebruikersnaam_invoer == NULL || $wachtwoord_invoer == NULL) { // als de gebruikersnaam of het wachtwoord leeg is
	header('Location: account.php');
	exit;
} else { // als de velden gevuld zijn updaten

	$wachtwoord_hashed = password_hash($wachtwoord_invoer, 
	PASSWORD_DEFAULT);

	$sql = mysqli_query($mysqli,"UPDATE users SET
			username =  '$gebruikersnaam_invoer',
			password =  '$wachtwoord_hashed',
			firstname =  '$voornaam_invoer',
			lastname =  '$achternaam_invoer',
			email =  '$email_invoer',
			laatst_bewerkt = '$day $date $year $time'
			WHERE id = '$id'");

}

header('Location: account.php');

?>
