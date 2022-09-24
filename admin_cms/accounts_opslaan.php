<?php
require_once("sessie.php");
$cms_pagina_titel = 'Account Opslaan..';
include_once("../instellingen.php");

$accountid = "";
$accountid = $_GET["accountid"];

$nieuw = $_GET["nieuw"];

// elementen ----------
$gebruikersnaam_alle = clean_urlVar($_POST['gebruikersnaam_alle']);
$wachtwoord_alle = clean_urlVar($_POST['wachtwoord_alle']);


if ($gebruikersnaam_alle == NULL || $wachtwoord_alle == NULL) {
	header('Location: account.php');
	exit;
}

$wachtwoord_hashed = password_hash($wachtwoord_alle, PASSWORD_DEFAULT);

if ($nieuw != 1) { // als er een bestaand account word geupdate

	$sql = mysqli_query($mysqli,"UPDATE users SET
				username =  '$gebruikersnaam_alle',
				password =  '$wachtwoord_hashed',
				laatst_bewerkt = '$day $date $year $time'
				WHERE id = '$accountid'");

} else { // als er een nieuw account word aangemaakt

	$sql = mysqli_query($mysqli,"INSERT INTO users SET username = '$gebruikersnaam_alle', password ='$wachtwoord_hashed', firstname = '$gebruikersnaam_alle', activated = '1', laatst_bewerkt = '$day $date $year $time'");

}

header('Location: account.php');

?>
