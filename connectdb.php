<?php

require ('assets/autoload.php');

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
	$base = "http://". $_SERVER['HTTP_HOST']. "/";
} else {
	$base = "https://". $_SERVER['HTTP_HOST']. "/";
}

$mysqli = new mysqli(
	$_SERVER['GLOBAL_HOSTNAME'],
	$_SERVER['GLOBAL_USERID'],
	$_SERVER['GLOBAL_PASSWORD'],
	$_SERVER['GLOBAL_DATABASE']
);

$mysqli->set_charset("utf8");
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}


// ftp gegevens
$ftp_server =    $_SERVER['FTP_SERVER'];
$ftp_username =  $_SERVER['FTP_USERNAME'];
$ftp_userpass =  $_SERVER['FTP_USERPASS'];
$ftp_uploadmap = $_SERVER['FTP_UPLOAD_FOLDER'];

?>
