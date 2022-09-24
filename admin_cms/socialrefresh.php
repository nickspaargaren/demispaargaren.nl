<?php 
include_once("../instellingen.php");

$query = "SELECT * FROM links";
$sql_links = $mysqli->query($query) ;
$tab_links = $sql_links->num_rows;

$array = array();

if($tab_links != 0) {
  while($tab_links = $sql_links->fetch_assoc()) {
	 $array[] = $tab_links;
  }
}




$facebook = $array[0]['clicks'];
$twitter = $array[1]['clicks'];
$googleplus = $array[2]['clicks'];
$instagram = $array[3]['clicks'];

echo json_encode( array( "facebook"=>"$facebook","twitter"=>"$twitter","googleplus"=>"$googleplus","instagram"=>"$instagram" ) );

?>