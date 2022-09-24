<?php
include("../template/instellingen.php");


// get the list of items id separated by cama (,)
$list_order = $_POST['list_order'];
// convert the string list to an array
$list = explode(',' , $list_order);
$i = 1 ;
foreach($sql_paginas as $id) {
  try {
      $sql  = 'UPDATE paginas SET volgorde = :item_order WHERE id = :id' ;
    $query = $pdo->prepare($sql);
    $query->bindParam(':item_order', $i, PDO::PARAM_INT);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
  } catch (PDOException $e) {
    echo 'PDOException : '.  $e->getMessage();
  }
  $i++ ;
}
?>
