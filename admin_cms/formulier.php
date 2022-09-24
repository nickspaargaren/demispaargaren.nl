<?php
require_once("sessie.php");
$cms_pagina_titel = 'Contactformulier';
include_once("../instellingen.php");
require("cms_head.php");
?>

<body>
<?php require("cms_nav.php") ?>

<div class="cms_inhoud">
	<div class="cms_container vb">

		<div class="titel-holder">
			<h1>Contactformulier</h1>
			<h2>Onderstaand de ingevulde berichten van het formulier.</h2>
		</div>
		<?php


// formulieren ophalen (meest recente bovenaan)
$query = "SELECT * FROM formulier ORDER BY tijd DESC";
$sql_paginas = $mysqli->query($query) ;
$tab_paginas = $sql_paginas->num_rows;


echo '<div class="formulieren">';

if($tab_paginas != 0) {
  while($tab_paginas = $sql_paginas->fetch_assoc()) {







	// Gelezen
	if($tab_paginas['gelezen'] != 1){
		echo '<div class="formulier">';
		echo '<a class="gelezen" title="Gelezen?" href="formulier_gelezen.php?form=' . $tab_paginas['id'] . '"><i class="fa fa-square-o"></i></a>';
	} else {
		// bericht is gelezen
		echo '<div class="formulier gelezen">';
		echo '<div class="gelezen"><i class="fa fa-check-square-o"></i></div>';
	}

	echo '
		<div class="naam">'.($tab_paginas['naam']).'</div>
		<div class="tijd">'.($tab_paginas['tijd']).'</div>
    <div class="email"><a href="mailto:'.($tab_paginas['email']).'?subject=Reactie website formulier">'.($tab_paginas['email']).'</a></div>
    <div class="bericht">'.($tab_paginas['bericht']).'</div>';
		echo '<div class="ipadres">';
		if($tab_paginas['ip'] != "Onbekend"){
			echo "<a target=\"_blank\" href=\"http://www.ip-tracker.org/locator/ip-lookup.php?ip=".($tab_paginas['ip'])."\">".($tab_paginas['ip']). "</a>";
		} else {
			echo $tab_paginas['ip'];
		}
		echo '</div>';

		// verwijderen
		echo '<a class="verwijderen" title="Verwijderen" href="formulier_verwijderen.php?form=' . $tab_paginas['id'] . '" onclick="return confirm(\'Weet je het zeker?\')"><i class="fa fa-times-circle"></i></a>
    </div>';
  }
}

echo '</div>';

?>


<div class="cleared"></div>
</div>
</div>
<div class="cleared"></div>
<?php include ("cms_footer.php"); ?>
</body>
</html>
