<?php

// paginas ophalen
$query = "SELECT * FROM paginas ORDER BY volgorde";
$sql_paginas = $mysqli->query($query) ;
$tab_paginas = $sql_paginas->num_rows;

$actual_link = "$_SERVER[REQUEST_URI]";
$actual_link = ltrim ($actual_link, '/');

echo "<ul>\n";

if($tab_paginas != 0) {
  while($tab_paginas = $sql_paginas->fetch_assoc()) {

	echo "<li class=\"";

	// kijken of het een speciale button is
	if ($tab_paginas['speciale_button'] == "1") {
		echo "menuknop ";
	}
	// kijken of de pagina actief is
	if ($tab_paginas['link'] == $actual_link){
		echo "active";
	}

	echo "\"><a href=\"".(strtolower($tab_paginas['link']))."\">".($tab_paginas['titel'])."</a></li>\n";
  }
}


echo "</ul>\n<div class=\"cleared\"></div>\n";




?>
