<?php
require_once("sessie.php");
$cms_pagina_titel = 'Activiteit verwijderen..';
include_once("../instellingen.php");

$activiteitid = "";
$activiteitid = $_GET["activiteitid"];



if ($activiteitid != 0) {
	// niet echt verwijderen maar inactief plaasten
	// $sql = mysqli_query($mysqli,"DELETE FROM inlogpogingen WHERE id = '$activiteitid'");
	$sql = mysqli_query($mysqli,"UPDATE inlogpogingen SET
				verwijderd =  '1' WHERE id = '$activiteitid'");
}

header('Location: activiteiten.php');

?>
