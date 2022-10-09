<?php
require_once("sessie.php");
$cms_pagina_titel = 'Opslaan..';
include_once("../instellingen.php");

if ($_GET["paginacheck"] == 'verwijderen'){ // wanneer een pagina word verwijderd
	$query = $pdo->prepare("DELETE FROM paginas WHERE id = :id");
	$query->execute([
		':id' => $_GET["pagina"]
	]);
}

// terug naar instellingen pagina
header("Location: paginas.php");
?>
