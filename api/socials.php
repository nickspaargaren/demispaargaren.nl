<?php
header("Content-Type: application/json; charset=UTF-8");
require ("../template/connectdb.php");
include_once("../instellingen.php");

$return_arr = [];

if ($tab_instellingen['siteonline'] != 1) {
  echo json_encode($return_arr, JSON_PRETTY_PRINT);
  exit;
}

$sql_links = $mysqli->query("SELECT * FROM links") ;

if($sql_links->num_rows != 0) {
  while($link = $sql_links->fetch_assoc()) {
    if ($link['url'] != ""){
      array_push($return_arr, [
        "id" => $link['id'],
        "link" => $link['link'],
        "naam" => $link['naam'],
        "url" => $link['url']
      ]);
    }
  }
}

echo json_encode($return_arr, JSON_PRETTY_PRINT);

?>