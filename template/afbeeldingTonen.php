<?php
$afbeelding_id = $_GET["id"];

// Informatie afbeelding ophalen van opgegeven id
$query = "SELECT link FROM afbeeldingen WHERE id = $afbeelding_id";
$sql_afbeeldingen = $mysqli->query($query) ;
$tab_afbeeldingen = $sql_afbeeldingen->num_rows;

if($tab_afbeeldingen != 0) {
	if($tab_afbeeldingen = $sql_afbeeldingen->fetch_assoc()) {

		echo '<div class="afbeelding"><img src="../uploads/'.$tab_afbeeldingen['link'].'"></div>';

	}
}



?>
