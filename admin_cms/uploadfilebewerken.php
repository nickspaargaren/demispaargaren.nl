<?php
require_once("sessie.php");
$cms_pagina_titel = 'Verwijderen..';
include_once("../instellingen.php");

$verwijderen = $_GET["verwijderen"];
$afbeelding_id = $_GET["id"];


if($verwijderen == 1){

	$file = new file();

	$melding = $file->delete($_GET["bestand"]);

	$sql = mysqli_query($mysqli, "DELETE FROM afbeeldingen WHERE id = '$afbeelding_id'");

	header('Location: afbeeldingen.php?melding=' . $melding);

} else {
	header('Location: afbeeldingen.php');
}
