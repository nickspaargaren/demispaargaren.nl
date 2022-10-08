<?php
require_once("sessie.php");
$cms_pagina_titel = 'Opslaan..';
include_once("../instellingen.php");

// elementen ----------
$paginalink_invoer = clean_urlVar(strtolower(str_replace(' ', '-', $_POST['paginalink'])));

if ($paginalink_invoer == NULL) {
	$paginalink_invoer = clean_urlVar(strtolower(str_replace(' ', '-', $_POST['paginatitel'])));
}
if ($settings->headertonen == 1) {
	$header_invoer = $_POST['header'];
} else {
	$header_invoer = '';
}

$specialebutton_invoer = isset($_POST['specialebutton']) ? 1 : 0;

$pagina_aanmaakdatum = $day;
$pagina_aanmaakdatum .= ' ' . $date;
$pagina_aanmaakdatum .= ' ' . $year;
$pagina_aanmaakdatum .= ' ' . $time;

// element updaten ----------
$paginacheck = $_GET["paginacheck"];

if ($paginacheck == 'nieuw'){ // wanneer een nieuwe pagina word aangemaakt

	$query = $pdo->prepare("INSERT INTO paginas SET
		titel = :titel,
		link = :link,
		header = :header,
		content = :content,
		speciale_button = :speciale_button,
		aanmaakdatum = :aanmaakdatum,
		timestamp = :timestamp",
	);

	$query->execute([
		':titel' => $_POST['paginatitel'],
		':link' => $paginalink_invoer,
		':header' => $header_invoer,
		':content' => $_POST['content'],
		':speciale_button' => $specialebutton_invoer,
		':aanmaakdatum' => $pagina_aanmaakdatum,
		':timestamp' => date("Y-m-d H:i:s"),
	]);

	$handle = $pdo->prepare("SELECT id FROM paginas WHERE timestamp = :timestamp");
	$handle->execute([
		':timestamp' => date("Y-m-d H:i:s")
	]);
	$returnPage = $handle->fetch(PDO::FETCH_OBJ);

	// Reload page with correct data
	header('Location: paginas_detail.php?pagina=' . $returnPage->id);

} else { // als er een bestaande pagina word bewerkt

	$query = $pdo->prepare("UPDATE paginas SET
		titel = :titel,
		link = :link,
		header = :header,
		content = :content,
		speciale_button = :speciale_button
		WHERE id = :id"
	);

	$query->execute([
	':titel' => $_POST['paginatitel'],
	':link' => $paginalink_invoer,
	':header' => $header_invoer,
	':content' => $_POST['content'],
	':speciale_button' => $specialebutton_invoer,
	':id' => $paginacheck,
	]);


	// terug naar instellingen pagina
	header("Location: paginas_detail.php?pagina=$paginacheck");
}

?>
