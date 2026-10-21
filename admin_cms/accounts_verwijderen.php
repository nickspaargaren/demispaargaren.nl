<?php

require_once("sessie.php");
$cms_pagina_titel = 'Account Opslaan..';
include_once("../instellingen.php");

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

$accountid = $_GET["accountid"];

if ($accountid != 0) {
    $query = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $query->execute([
        ':id' => $accountid,
    ]);
}

header('Location: account.php');
