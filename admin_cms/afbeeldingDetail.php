<?php
require_once("sessie.php");
$cms_pagina_titel = 'afbeelding Detail';
include_once("../instellingen.php");


$afbeelding_id = $_GET["id"];

// Informatie afbeelding ophalen van opgegeven id
$query = "SELECT * FROM afbeeldingen WHERE id = $afbeelding_id";
$sql_afbeeldingen = $mysqli->query($query) ;
$tab_afbeeldingen = $sql_afbeeldingen->num_rows;

if($tab_afbeeldingen != 0) {
	while($tab_afbeeldingen = $sql_afbeeldingen->fetch_assoc()) {

		echo '
		<div class="afbeeldingHolder_op_site" id="'.$tab_afbeeldingen['id'].'">
			<div class="afbHoldersite">
				<div class="titel-holder">
					<div class="bestandsgrootte">'.bestandsgrootteLeesbaar($tab_afbeeldingen['bestandsgrootte']).'</div>
					<h1>'.$tab_afbeeldingen['omschrijving'].'</h1>
					<h2 class="datum">Geüpload op: '.$tab_afbeeldingen['uploaddatum'].'<a href="../uploads/'.$tab_afbeeldingen['link'].'" class="link">../uploads/' . $tab_afbeeldingen['link'].'</a></h2>
				</div>

				<div class="afbeelding"><img src="../uploads/'.$tab_afbeeldingen['link'].'"></div>
			</div>
			<form action="afbeeldingDetailOpslaan.php?id='. $afbeelding_id.'" method="post">
			<textarea type="text" placeholder="Vul hier je omschrijving in." name="omschrijving">'.$tab_afbeeldingen['omschrijving'].'</textarea>
			<button class="cms_button" value="Opslaan" type="submit"><i class="fa fa-save"></i>Opslaan</button>
			<a class="cms_button delete" href="uploadfilebewerken.php?verwijderen=1&bestand='.$tab_afbeeldingen['link'].'&id='.$tab_afbeeldingen['id'].'" onclick="return confirm(\''.$tab_afbeeldingen['link'].' echt verwijderen?\')"><i class="fa fa-times"></i>verwijderen</a>
			</form>

		</div>';

	}
}



?>
