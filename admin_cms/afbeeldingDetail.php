<?php
require_once("sessie.php");
$cms_pagina_titel = 'afbeelding Detail';
include_once("../instellingen.php");

// Informatie afbeelding ophalen van opgegeven id
$handle = $pdo->prepare("SELECT * FROM afbeeldingen WHERE id = :id");
$handle->execute([
	':id' => $_GET["id"]
]);
$image = $handle->fetch(PDO::FETCH_OBJ);

echo '
<div class="afbeeldingHolder_op_site" id="'.$image->id.'">
	<div class="afbHoldersite">
		<div class="titel-holder">
			<div class="bestandsgrootte">'.bestandsgrootteLeesbaar($image->bestandsgrootte).'</div>
			<h1>'.$image->omschrijving.'</h1>
			<h2 class="datum">Geüpload op: '.$image->uploaddatum.'<a href="../uploads/'.$image->link.'" class="link">../uploads/' . $image->link.'</a></h2>
		</div>

		<div class="afbeelding"><img src="../uploads/'.$image->link.'"></div>
	</div>
	<form action="afbeeldingDetailOpslaan.php?id='. $image->id.'" method="post">
		<textarea type="text" placeholder="Vul hier je omschrijving in." name="omschrijving">'.$image->omschrijving.'</textarea>
		<button class="cms_button" value="Opslaan" type="submit"><i class="fa fa-save"></i>Opslaan</button>
		<a class="cms_button delete" href="uploadfilebewerken.php?verwijderen=1&bestand='.$image->link.'&id='.$image->id.'" onclick="return confirm(\''.$image->link.' echt verwijderen?\')"><i class="fa fa-times"></i>verwijderen</a>
	</form>

</div>';

?>
