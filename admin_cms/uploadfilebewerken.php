<?php
require_once("sessie.php");
$cms_pagina_titel = 'Verwijderen..';
include_once("../instellingen.php");

$verwijderen = $_GET["verwijderen"];
$bestand = $ftp_uploadmap . $_GET["bestand"];
$afbeelding_id = $_GET["id"];


if($verwijderen == 1){

	$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
	$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);





	// try to delete $file
	if (ftp_delete($ftp_conn, $bestand)) {
		$melding = $bestand . ' is verwijderd.';

		$sql = mysqli_query($mysqli,"DELETE FROM afbeeldingen WHERE id = '$afbeelding_id'");


	} else {
		$melding = $bestand .' is verwijderd.';
		$sql = mysqli_query($mysqli,"DELETE FROM afbeeldingen WHERE id = '$afbeelding_id'");
	}




	// close the connection
	ftp_close($conn_id);


	header('Location: afbeeldingen.php?melding=' . $melding);

}else {
	echo 'terug';
}



?>
