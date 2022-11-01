<?php
require_once("sessie.php");
$cms_pagina_titel = 'Opslaan..';
include_once("../instellingen.php");

// elementen ----------
$dashb_suggesties = isset($_POST['dashb_suggesties']) ? 1 : 0;

$query = $pdo->prepare("UPDATE users SET dashb_suggesties = :dashb_suggesties WHERE id = :id");
$query->execute([
	':dashb_suggesties' => $dashb_suggesties,
	':id' => $_SESSION['id']
]);

// terug naar instellingen pagina
header("Location: instellingen_dashboard.php");
