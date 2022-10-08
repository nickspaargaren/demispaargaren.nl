<?php

// Fetch pages
$handle = $pdo->prepare("SELECT titel, link, speciale_button FROM paginas ORDER BY volgorde");
$handle->execute();
$pages = $handle->fetchAll(PDO::FETCH_OBJ);

$actual_link = "$_SERVER[REQUEST_URI]";
$actual_link = ltrim ($actual_link, '/');

echo "<ul>\n";

foreach ($pages as $page) {

	echo "<li class=\"";

	// kijken of het een speciale button is
	if ($page->speciale_button == "1") {
		echo "menuknop ";
	}
	// kijken of de pagina actief is
	if ($page->link == $actual_link){
		echo "active";
	}

	echo "\"><a href=\"".(strtolower($page->link))."\">".($page->titel)."</a></li>\n";

}


echo "</ul>\n<div class=\"cleared\"></div>\n";




?>
