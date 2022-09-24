<?php
require_once("sessie.php");
$cms_pagina_titel = 'Verwijderen..';
include_once("../instellingen.php");

$form = $_GET["form"];

$sql = mysqli_query($mysqli,"DELETE FROM formulier WHERE id = '$form'");


// terug naar de formulier pagina
header("Location: formulier.php");
?>
