<?php
require_once("sessie.php");
$cms_pagina_titel = 'Verwijderen..';
include_once("../instellingen.php");

if($_GET["verwijderen"] == 1){

	$file = new file();

	$melding = $file->delete($_GET["bestand"]);

	$query = $pdo->prepare("DELETE FROM afbeeldingen WHERE id = :id");
	$query->execute([
		':id' => $_GET["id"]
	]);

	header('Location: afbeeldingen.php?melding=' . $melding);

} else {
	header('Location: afbeeldingen.php');
}
