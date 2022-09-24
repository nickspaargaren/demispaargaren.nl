<?php
require_once("sessie.php");
$cms_pagina_titel = 'Opslaan..';
include_once("../instellingen.php");

$form = $_GET["form"];

$sql = mysqli_query($mysqli,"UPDATE formulier SET
	gelezen =  '1'
	WHERE id = '$form'
");



// terug naar de formulier pagina
header("Location: formulier.php");
?>
