<?php
require_once("sessie.php");
$cms_pagina_titel = 'Opslaan..';
include_once("../instellingen.php");

// elementen ----------
$paginatitel_invoer = clean_urlVar($_POST['paginatitel']);
// $paginatitel_invoer = preg_replace('/\s+/', '', $paginatitel_invoer); // o.a. spaties weghalen


$paginalink_invoer = clean_urlVar(strtolower(str_replace(' ', '-', $_POST['paginalink'])));

if ($paginalink_invoer == NULL) {
	$paginalink_invoer = clean_urlVar(strtolower(str_replace(' ', '-', $_POST['paginatitel'])));
}
if ($headertonen == 1) {
	$header_invoer = $_POST['header'];
} else {
	$header_invoer = '';
}

$content_invoer = $_POST['content'];

$specialebutton_invoer = isset($_POST['specialebutton']) ? 1 : 0;

$pagina_aanmaakdatum = $day;
$pagina_aanmaakdatum .= ' ' . $date;
$pagina_aanmaakdatum .= ' ' . $year;
$pagina_aanmaakdatum .= ' ' . $time;

$timestamp = date("Y-m-d H:i:s");

// element updaten ----------
$paginacheck = $_GET["paginacheck"];

if ($paginacheck == 'nieuw'){ // wanneer een nieuwe pagina word aangemaakt

	$sql = mysqli_query($mysqli,"INSERT INTO paginas SET
		titel = '$paginatitel_invoer',
		link = '$paginalink_invoer',
		header = '$header_invoer',
		content = '$content_invoer',
		speciale_button = '$specialebutton_invoer',
		aanmaakdatum = '$pagina_aanmaakdatum',
		timestamp = '$timestamp'
		");
} else { // als er een bestaande pagina word bewerkt
	$sql = mysqli_query($mysqli,"UPDATE paginas SET titel = '$paginatitel_invoer',
			link = '$paginalink_invoer',
			header = '$header_invoer',
			content = '$content_invoer',
			speciale_button = '$specialebutton_invoer'
		WHERE id = '$paginacheck'
	");
}

// terug naar instellingen pagina
header("Location: paginas_detail.php?pagina=$paginacheck");
?>
