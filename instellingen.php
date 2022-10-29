<?php
/*
 - - - Algemene instellingen - - -
*/

if ($_SERVER['HTTP_HOST'] !== 'localhost:8000') {
	header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
	header("Content-Security-Policy: default-src 'self' 'unsafe-inline' demispaargaren.nl www.demispaargaren.nl www.google-analytics.com stats.g.doubleclick.net *.hotjar.com wss://*.hotjar.com use.typekit.net p.typekit.net maxcdn.bootstrapcdn.com www.youtube-nocookie.com www.youtube.com; script-src demispaargaren.nl www.demispaargaren.nl www.google-analytics.com *.hotjar.com 'unsafe-inline'; style-src 'self' 'unsafe-inline' demispaargaren.nl www.demispaargaren.nl use.typekit.net p.typekit.net maxcdn.bootstrapcdn.com fonts.googleapis.com; font-src 'self' use.typekit.net fonts.gstatic.com maxcdn.bootstrapcdn.com; img-src 'self' demispaargaren.nl www.demispaargaren.nl; form-action 'self'; frame-ancestors 'self'");
	header("X-Content-Type-Options: nosniff");
	header("X-Frame-Options: SAMEORIGIN");
}

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

$day = date('l');
$date = date('j') . " " . date('F');
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
