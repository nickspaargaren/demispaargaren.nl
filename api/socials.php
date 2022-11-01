<?php
header("Content-Type: application/json; charset=UTF-8");
require ("../connectdb.php");
include_once("../instellingen.php");

if ($settings->siteonline != 1) {
  echo json_encode([]);
  exit;
}

$handle = $pdo->prepare("SELECT id, link, naam, url FROM links");

$handle->execute();

$result = $handle->fetchAll(PDO::FETCH_OBJ);

echo json_encode($result);
