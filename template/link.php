<?php
$linktype = $_GET["link"];
$url = $_GET["url"];

// clicks uitlezen in db
$query = "SELECT * FROM links WHERE link = '$linktype'";
$sql_links = $mysqli->query($query);
$tab_links = $sql_links->fetch_assoc();

$clicks = $tab_links['clicks'];

$clicks++;

// clicks plaatsen in db
$sql = mysqli_query($mysqli,"UPDATE links SET clicks = '$clicks' WHERE link = '$linktype'");


header("Location: ".$url);
?>
