<?php
/*
 - - - Algemene instellingen - - -
*/
require_once("connectdb.php");

$cms_versie = '1.9.2 Beta';

// instellingen gegevens ophalen
$handle = $pdo->prepare("SELECT * FROM instellingen");
$handle->execute();
$settings = $handle->fetch(PDO::FETCH_OBJ);

if (isset($_SESSION['id'])) {

	// alle account gegevens ophalen
	$handle = $pdo->prepare("SELECT * FROM users WHERE id= :id");
	$handle->execute([
		':id' => $_SESSION['id']
	]);
	$gebruikergegevens = $handle->fetch(PDO::FETCH_OBJ);
}

// datum en tijd
setlocale(LC_ALL, 'nl_NL');
date_default_timezone_set("Europe/Amsterdam");

$day = ucfirst(strftime('%A'));
$date = date('d') . " " . ucfirst(strftime('%B'));
$time = date('H:i');
$year = date('Y');


// copyright
$startYear	=	2014;
$thisYear	=	date('Y');
if ($thisYear > $startYear)	{
	$copyright	=	"$startYear &ndash; $thisYear";
} else	{
	$copyright	=	$startYear;
}


// ip adress
$ip = $_SERVER["REMOTE_ADDR"];

if ($ip == "::1" || $ip == "127.0.0.1") {
	$ip = 'Onbekend';
}

// functies invoegen
require ("functions.php");


?>
