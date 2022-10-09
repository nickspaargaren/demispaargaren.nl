<?php
require_once("sessie.php");
$cms_pagina_titel = 'Verwijderen..';
include_once("../instellingen.php");

$query = $pdo->prepare("DELETE FROM formulier WHERE id = :id");
$query->execute([
  ':id' => $_GET["form"]
]);

// terug naar de formulier pagina
header("Location: formulier.php");
?>
