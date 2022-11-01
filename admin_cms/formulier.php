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
			$handle = $pdo->prepare("SELECT * FROM formulier ORDER BY tijd DESC");
			$handle->execute();
			$forms = $handle->fetchAll(PDO::FETCH_OBJ);

			echo '<div class="formulieren">';

			foreach ($forms as $form) {
				// Gelezen
				if ($form->gelezen != 1) {
					echo '<div class="formulier">';
					echo '<a class="gelezen" title="Gelezen?" href="formulier_gelezen.php?form=' . $form->id . '"><i class="fa fa-square-o"></i></a>';
				} else {
					// bericht is gelezen
					echo '<div class="formulier gelezen">';
					echo '<div class="gelezen"><i class="fa fa-check-square-o"></i></div>';
				}

				echo '
		<div class="naam">' . ($form->naam) . '</div>
		<div class="tijd">' . ($form->tijd) . '</div>
    <div class="email"><a href="mailto:' . ($form->email) . '?subject=Reactie website formulier">' . ($form->email) . '</a></div>
    <div class="bericht">' . ($form->bericht) . '</div>';
				echo '<div class="ipadres">';
				if ($form->ip != "Onbekend") {
					echo "<a target=\"_blank\" href=\"http://www.ip-tracker.org/locator/ip-lookup.php?ip=" . ($form->ip) . "\">" . ($form->ip) . "</a>";
				} else {
					echo $form->ip;
				}
				echo '</div>';

				// verwijderen
				echo '<a class="verwijderen" title="Verwijderen" href="formulier_verwijderen.php?form=' . $form->id . '" onclick="return confirm(\'Weet je het zeker?\')"><i class="fa fa-times-circle"></i></a>
    </div>';
			}

			echo '</div>';

			?>


			<div class="cleared"></div>
		</div>
	</div>
	<div class="cleared"></div>
	<?php include("cms_footer.php"); ?>
</body>

</html>