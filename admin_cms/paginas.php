<?php
require_once("sessie.php");
$cms_pagina_titel = 'Pagina\'s';
include_once("../instellingen.php");
require("cms_head.php");
?>

<body>
<?php require("cms_nav.php") ?>

<div class="cms_inhoud">
	<div class="cms_container vb">
		<div class="titel-holder">
			<h1>Overzicht van de pagina's</h1>
			<h2>Hier kun je pagina's inzien maar natuurlijk ook nieuwe pagina's aanmaken. Waar gaat je nieuwe pagina over?</h2>
		</div>

<!-- Alle paginas -->
<?php


if(isset($_POST["submit"])) {
	$id_ary = explode(",",$_POST["row_order"]);
	for($i=0;$i<count($id_ary);$i++) {
		$mysqli->query("UPDATE paginas SET volgorde='" . $i . "' WHERE id=". $id_ary[$i]);
	}
}
$result = $mysqli->query("SELECT * FROM paginas ORDER BY volgorde");

?>
<form name="frmQA" method="POST" />
<input type = "hidden" name="row_order" id="row_order" />
<div id="sortable-row">
<?php
while($row = $result->fetch_assoc()) {

echo '<div class="projectHolder" id="' . $row['id'].'"><a href="paginas_detail.php?pagina=' . $row['id'] . '" class="link"></a><div class="volgorde_icoon"><i class="fa fa-bars"></i></div><div class="projectNaam">' . $row['titel'];


// De datum is minder dan een dag / week aangemaakt, daarna gaat het label automatisch weg
if (strtotime($row['timestamp']) > strtotime("-1 day")) {
	echo '<span class="nieuw">Nieuw</span>';
}

echo '</div><a href="paginas_detail.php?pagina=' . $row['id'] . '" class="projectWijzigen">Wijzigen</a><a href="http://' . $_SERVER['HTTP_HOST']. '/' . ($row['link']) . '" class="projectBekijken" target="_blank" >Bekijken</a><div class="projectStartDatum">' . $row['aanmaakdatum'] . '</div><div class="cleared"></div></div>';
echo "\n";
}
$result->free();
$mysqli->close();
?>
</div>
<a href="paginas_detail.php?pagina=nieuw" class="cms_button">Nieuwe pagina</a> <button type="submit" onclick="saveOrder();"  name="submit" class="cms_button grijs" style="border: none !important;"><i class="fa fa-bars"></i>Volgorde opslaan</button>
</form>

<script>
$(function() {
	$('#sortable-row').sortable({
		placeholder: "ui-state-highlight"
	});
});

function saveOrder() {
	var selectedLanguage = new Array();
	$('#sortable-row .projectHolder').each(function() {
		selectedLanguage.push($(this).attr("id"));
	});
	document.getElementById("row_order").value = selectedLanguage;
}
</script>
</div>
</div>
<div class="cleared"></div>
<?php include ("cms_footer.php"); ?>
</body>
</html>
