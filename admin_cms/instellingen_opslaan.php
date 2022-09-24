<?php
require_once("sessie.php");
$cms_pagina_titel = 'Opslaan..';
include_once("../instellingen.php");


// elementen ----------
$projectnaam_invoer = clean_urlVar($_POST['projectnaam']);
$auteur_invoer = clean_urlVar($_POST['auteur']);
$email_invoer = clean_urlVar($_POST['email']);
$zoomen_invoer = isset($_POST['zoomen']) ? 1 : 0;
$footer = $_POST['footer'];
$siteonline_invoer = isset($_POST['siteonline']) ? 1 : 0;
$afbeeldingentonen_invoer = isset($_POST['afbeeldingentonen']) ? 1 : 0;
$headertonen_invoer = isset($_POST['headertonen']) ? 1 : 0;
$description_invoer = clean_urlVar($_POST['description']);


// element updaten ----------
$sql = mysqli_query($mysqli, "UPDATE instellingen SET
		projectnaam = '$projectnaam_invoer',
		auteur = '$auteur_invoer',
		email = '$email_invoer',
		zoomen = '$zoomen_invoer',
		footer = '$footer',
		siteonline = '$siteonline_invoer',
		afbeeldingentonen = '$afbeeldingentonen_invoer',
		headertonen = '$headertonen_invoer',
		description = '$description_invoer'
		WHERE id = 1");


// terug naar instellingen pagina
header("Location: instellingen.php");

?>
