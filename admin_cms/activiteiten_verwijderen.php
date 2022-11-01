<?php
require_once("sessie.php");
$cms_pagina_titel = 'Activiteit verwijderen..';
include_once("../instellingen.php");

$activiteitid = $_GET["activiteitid"];

if ($activiteitid != 0) {
	// niet echt verwijderen maar inactief plaasten
	$query = $pdo->prepare("UPDATE inlogpogingen SET verwijderd = '1' WHERE id = :id");
	$query->execute([
		':id' => $activiteitid
	]);
}

header('Location: activiteiten.php');
