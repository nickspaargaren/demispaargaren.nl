<?php
session_start();

include_once("../instellingen.php");
require ('head.php');

// elementen ----------
$form_naam = clean_urlVar($_POST['naam']);
$form_email = clean_urlVar($_POST['email']);
$form_bericht = clean_urlVar($_POST['bericht']);
$formdatum = date('Y-m-d H:i:s');

	$sql = mysqli_query($mysqli,"INSERT INTO formulier SET
		naam = '$form_naam',
		email ='$form_email',
		bericht = '$form_bericht',
		tijd = '$formdatum',
		ip = '$ip',
		gelezen = '0'");


// eventueel email sturen naar de accounts?


echo "Bedankt voor je bericht!";

?>
