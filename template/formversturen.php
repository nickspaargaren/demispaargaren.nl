<?php
include_once("../instellingen.php");
require ('head.php');

$statement = $pdo->prepare("INSERT INTO formulier SET
	naam = :naam,
	email = :email,
	bericht = :bericht,
	tijd = :tijd,
	ip = :ip,
	gelezen = :gelezen");

$statement->execute([
	':naam' => $_POST['naam'],
	':email' => $_POST['email'],
	':bericht' => $_POST['bericht'],
	':tijd' => date('Y-m-d H:i:s'),
	':ip' => $ip,
	':gelezen' => '0'
]);

// eventueel email sturen naar de accounts?


echo "Bedankt voor je bericht!";

?>
