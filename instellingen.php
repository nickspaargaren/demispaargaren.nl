<?php
/*
 - - - Algemene instellingen - - -
*/
require_once("connectdb.php");

$cms_versie = '1.9.2 Beta';

// instellingen gegevens ophalen
$query = "SELECT * FROM instellingen WHERE id=1";
$sql_instellingen = $mysqli->query($query);
$tab_instellingen = $sql_instellingen->num_rows;

if($tab_instellingen != 0) {
	if($tab_instellingen = $sql_instellingen->fetch_assoc()) {
		$projectnaam = $tab_instellingen['projectnaam'];
		$auteur = $tab_instellingen['auteur'];
		$email = $tab_instellingen['email'];
		$footer = $tab_instellingen['footer'];
		$hotjar = $tab_instellingen['hotjar'];
		$headertonen = $tab_instellingen['headertonen'];
	}
}

if($tab_instellingen['zoomen']=="1"){
	$zoomen = 'checked="checked"';
	$zoomen2 = 'yes';
} else {
	$zoomen = '';
	$zoomen2 = 'no';
}

$description = $tab_instellingen['description'];

$analytics = $tab_instellingen['analytics'];

$id = $_SESSION['id'];

// alle account gegevens ophalen
$sql_gebruikergegevens = $mysqli->query("SELECT * FROM users WHERE id=$id") ;

if($sql_gebruikergegevens->num_rows != 0) {
  $tab_gebruikergegevens = $sql_gebruikergegevens->fetch_assoc();
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
