<?php
require_once("sessie.php");
$cms_pagina_titel = 'Opslaan..';
include_once("../instellingen.php");

$query = $pdo->prepare("UPDATE formulier SET gelezen =  '1' WHERE id = :id");
$query->execute([
	':id' => $_GET["form"]
]);


// terug naar de formulier pagina
header("Location: formulier.php");
