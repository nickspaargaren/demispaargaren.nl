<?php
require_once("sessie.php");
$cms_pagina_titel = 'Opslaan..';
include_once("../instellingen.php");

// element updaten ----------
$statement = $pdo->prepare("UPDATE links SET url = CASE id
	WHEN 1 THEN :facebook
	WHEN 2 THEN :twitter
	WHEN 3 THEN :googleplus
	WHEN 4 THEN :instagram
	END
	WHERE id IN (1, 2, 3, 4)
");

$statement->execute([
	':facebook' => $_POST['facebook'],
	':twitter' => $_POST['twitter'],
	':googleplus' => $_POST['googleplus'],
	':instagram' => $_POST['instagram'],
]);

// terug naar instellingen pagina
header("Location: socialmedia.php");
