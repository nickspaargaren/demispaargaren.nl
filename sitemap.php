<?php

include_once("instellingen.php");

$handle = $pdo->prepare("SELECT link FROM paginas ORDER BY volgorde");
$handle->execute();
$pages = $handle->fetchAll(PDO::FETCH_OBJ);

header("Content-type: text/plain;");

foreach ($pages as $page) {
    if ($page->link == 'home') {
        echo $base . PHP_EOL;
    } else {
        echo $base . $page->link . PHP_EOL;
    }
}
