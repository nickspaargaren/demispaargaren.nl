<?php
require_once("sessie.php");
$cms_pagina_titel = 'Opslaan..';
include_once("../instellingen.php");

$paginacheck = $_GET["paginacheck"];
$pagina = $_GET["pagina"];

if ($paginacheck == 'verwijderen'){ // wanneer een pagina word verwijderd
	$sql = mysqli_query($mysqli,"DELETE FROM paginas WHERE id = '$pagina'");
}

// terug naar instellingen pagina
header("Location: paginas.php");
?>
