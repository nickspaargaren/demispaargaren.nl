<?php
require_once("sessie.php");
$cms_pagina_titel = 'Opslaan..';
include_once("../instellingen.php");

if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
	$usname = $_SESSION['username'];
} else {
	header('Location: index.php');
	exit;
}

// elementen ----------
$dashb_socialclicks = isset($_POST['dashb_socialclicks']) ? 1 : 0;
$dashb_facebook = isset($_POST['dashb_facebook']) ? 1 : 0;
$dashb_suggesties = isset($_POST['dashb_suggesties']) ? 1 : 0;


$sql = mysqli_query($mysqli,"UPDATE users SET
		dashb_socialclicks = $dashb_socialclicks,
		dashb_facebook = $dashb_facebook,
		dashb_suggesties = $dashb_suggesties
		WHERE id = $id");

// terug naar instellingen pagina
header("Location: instellingen_dashboard.php");

?>
