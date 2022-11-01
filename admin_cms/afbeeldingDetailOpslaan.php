<?php
require_once("sessie.php");

$cms_pagina_titel = 'Opslaan..';

include_once("../instellingen.php");

$statement = $pdo->prepare("UPDATE afbeeldingen SET
	omschrijving = :omschrijving
	WHERE id = :id
");

$statement->execute([
	':omschrijving' => $_POST['omschrijving'],
	':id' => $_GET["id"],
]);

// terug naar het overzicht
header("Location: afbeeldingen.php");
