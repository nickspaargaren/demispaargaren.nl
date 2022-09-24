<?php
header("Content-Type: application/json; charset=UTF-8");
require ("../template/connectdb.php");
include_once("../instellingen.php");

$return_arr = [];

if ($tab_instellingen['siteonline'] != 1) {
  echo json_encode($return_arr, JSON_PRETTY_PRINT);
  exit;
}

$sql_paginas = $mysqli->query("SELECT * FROM paginas ORDER BY volgorde") ;

if($sql_paginas->num_rows != 0) {
  while($pagina = $sql_paginas->fetch_assoc()) {
    array_push($return_arr, [
      "id" => $pagina['id'],
      "titel" => $pagina['titel'],
      "link" => $pagina['link'],
      "content" => $pagina['content']
    ]);
  }
}

echo json_encode($return_arr, JSON_PRETTY_PRINT);

?>