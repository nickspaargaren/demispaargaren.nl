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
$dashb_suggesties = isset($_POST['dashb_suggesties']) ? 1 : 0;


$sql = mysqli_query($mysqli,"UPDATE users SET
		dashb_suggesties = $dashb_suggesties
		WHERE id = $id");

// terug naar instellingen pagina
header("Location: instellingen_dashboard.php");

?>
