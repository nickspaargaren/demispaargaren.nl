<?php
session_start();
$cms_pagina_titel = 'Account Opslaan..';
include_once("../instellingen.php");

if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
	$usname = $_SESSION['username'];
} else {
	header('Location: index.php');
	exit;
}

$accountid = "";
$accountid = $_GET["accountid"];

if ($accountid != 0) {

	$sql = mysqli_query($mysqli,"DELETE FROM users WHERE id = '$accountid'");

}

header('Location: account.php');

?>
