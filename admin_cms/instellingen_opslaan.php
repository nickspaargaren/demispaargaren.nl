<?php
require_once("sessie.php");
$cms_pagina_titel = 'Opslaan..';
include_once("../instellingen.php");

// element updaten ----------
$query = $pdo->prepare("UPDATE instellingen SET
	projectnaam = :projectnaam,
	auteur = :auteur,
	email = :email,
	footer = :footer,
	siteonline = :siteonline,
	headertonen = :headertonen,
	description = :description
	WHERE id = 1"
);

$query->execute([
	':projectnaam' => $_POST['projectnaam'],
	':auteur' => $_POST['auteur'],
	':email' => $_POST['email'],
	':footer' => $_POST['footer'],
	':siteonline' => isset($_POST['siteonline']) ? 1 : 0,
	':headertonen' => isset($_POST['headertonen']) ? 1 : 0,
	':description' => $_POST['description'],
	
]);

// terug naar instellingen pagina
header("Location: instellingen.php");
