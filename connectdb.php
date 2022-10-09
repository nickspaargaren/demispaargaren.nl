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

$pdo = new PDO("mysql:host=" . $_SERVER['GLOBAL_HOSTNAME'] . ";dbname=" . $_SERVER['GLOBAL_DATABASE'] . ";charset=utf8mb4",
	$_SERVER['GLOBAL_USERID'],
	$_SERVER['GLOBAL_PASSWORD'],
	array(
		PDO::ATTR_EMULATE_PREPARES, false,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_PERSISTENT => false
	)
);

?>
