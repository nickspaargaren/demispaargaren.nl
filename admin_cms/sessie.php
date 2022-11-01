<?php
session_start();

if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
	$usname = $_SESSION['username'];
} else {
	header('Location: index.php');
	session_destroy();
}
