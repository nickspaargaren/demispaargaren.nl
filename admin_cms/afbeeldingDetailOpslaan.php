<?php
require_once("sessie.php");

$cms_pagina_titel = 'Opslaan..';

include_once("../instellingen.php");

// afbeelding informatie
$afbeelding_id = $_GET["id"];
$afbeelding_omschrijving = $_POST['omschrijving'];


$sql = mysqli_query($mysqli,"UPDATE afbeeldingen SET
	omschrijving =  '".$afbeelding_omschrijving."'
	WHERE id = '$afbeelding_id'
");


// terug naar het overzicht
header("Location: afbeeldingen.php");


?>
