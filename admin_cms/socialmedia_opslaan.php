<?php
require_once("sessie.php");
$cms_pagina_titel = 'Opslaan..';
include_once("../instellingen.php");


// elementen ----------
$facebooklink = clean_urlVar($_POST['facebook']);
$twitterlink = clean_urlVar($_POST['twitter']);
$googlepluslink = clean_urlVar($_POST['googleplus']);
$instagramlink = clean_urlVar($_POST['instagram']);

$timestamp = date("Y-m-d H:i:s");

$usname = $_SESSION['username'];

// element updaten ----------
mysqli_query($mysqli, "UPDATE links SET url = CASE id
	WHEN 1 THEN '$facebooklink'
	WHEN 2 THEN '$twitterlink'
	WHEN 3 THEN '$googlepluslink'
	WHEN 4 THEN '$instagramlink'
	END
	WHERE id IN (1, 2, 3, 4)");


// terug naar instellingen pagina
header("Location: socialmedia.php");

?>
