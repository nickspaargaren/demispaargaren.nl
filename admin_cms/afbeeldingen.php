<?php
require_once("sessie.php");

$start = microtime(true);
$cms_pagina_titel = 'Afbeeldingen';

include_once("../instellingen.php");
require("cms_head.php");

?>

<body>
<?php require("cms_nav.php") ?>

<div class="cms_inhoud">
	<div class="cms_container vb">
		<div id="afbeeldingDetail"></div>
		<div class="uploadenHolder">
			<h2>Nieuwe afbeelding uploaden</h2>
			<form action="uploader.php" method="post" enctype="multipart/form-data">
				<input type="text" name="omschrijving" placeholder="Omschrijving"/>
		    <input type="file" name="fileToUpload" id="fileToUpload">
				<button class="cms_button links" value="Opslaan" type="submit"><i class="fa fa-upload"></i>Uploaden</button>
				<div class="cms_button delete uploadToggle rechts"><i class="fa fa-times"></i> Annuleren</div>
			</form>
		</div>

	<div class="titel-holder">
		<h1>Overzicht van de afbeeldingen</h1>
		<h2>Hier kun je de afbeeldingen die al zijn geupload bekijken. Je kunt hier ook nieuwe uploaden. (Max 1MB per afbeelding) </h2>
	</div>


	<?php
	echo "<div class=\"afbeeldingen_op_site\">";

	// nieuwe uploaden
	echo '<a class="afbeeldingHolder_op_site nieuw uploadToggle"><i class="fa fa-plus-circle"></i></a>';

	// Afbeeldingen ophalen
	$handle = $pdo->prepare("SELECT * FROM afbeeldingen ORDER BY uploaddatum DESC");
	$handle->execute();
	$images = $handle->fetchAll(PDO::FETCH_OBJ);

	foreach ($images as $image) {
			echo '
			<div class="afbeeldingHolder_op_site" id="'.$image->id.'">
				<div class="afbHoldersite">
					<div class="knoppen">
						<a class="bewerken" onclick="afbeeldingDetail(\''.$image->id.'\');"><i class="fa fa-pencil"></i></a>
						<a class="downloaden" href="../uploads/'.$image->link.'" download><i class="fa fa-cloud-download"></i></a>
						<a class="verwijderen" href="uploadfilebewerken.php?verwijderen=1&bestand='.$image->link.'&id='.$image->id.'" onclick="return confirm(\''.$image->link.' echt verwijderen?\')"><i class="fa fa-trash"></i></a>
					</div>
					<img src="../uploads/'.$image->link.'">
				</div>
				<div class="beschrijving">'.$image->omschrijving.'</div>
				<div class="bestandsgrootte">'.bestandsgrootteLeesbaar($image->bestandsgrootte).'</div>
			</div>';
	}


echo '</div><div class="cleared"></div>';
$end = microtime(true);
printf("Afbeeldingen geladen in %f seconden", $end - $start);

$meldingtonen = $_GET["melding"];

if($meldingtonen != NULL) {
	echo '<div class="notificatie">' .$meldingtonen . '<a href="afbeeldingen.php" style="margin: 0px 0px 0px 15px;"><i class="fa fa-times"></i></a></div';
}
?>
	</div>
</div>
<div class="cleared"></div>
<?php include ("cms_footer.php"); ?>

<script type="text/javascript">

$(".uploadToggle").click(function(){
		$(".uploadenHolder").toggleClass("tonen");
		$(".meldingBg").toggleClass("tonen");
});

function afbeeldingDetail(afbeelding) {
	$('.meldingBg').addClass('tonen');

	$.ajax({
		url: "afbeeldingDetail.php?id="+afbeelding
	}).done(function(data) {
		$('#afbeeldingDetail').html(data);
	});
};

</script>

</body>
</html>
