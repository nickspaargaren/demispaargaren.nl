<?php
require_once("sessie.php");
$cms_pagina_titel = 'Activiteiten';
include_once("../instellingen.php");
require("cms_head.php");


$handle = $pdo->prepare("SELECT inlogpogingen.*, users.firstname, 
		CASE WHEN users.firstname IS NULL
		THEN false
    ELSE true
		END AS isuser
    FROM inlogpogingen
    LEFT JOIN users
    on inlogpogingen.gebruikersnaam = users.firstname
		ORDER BY tijd DESC");
$handle->execute();
$activities = $handle->fetchAll(PDO::FETCH_OBJ);

?>

<body>
	<?php require("cms_nav.php") ?>

	<div class="cms_inhoud">
		<div class="cms_container vb">
			<div class="opties">
				<a class="optieknop show_ingelogd"><i class="fa fa-eye"></i></a>
			</div>

			<div class="titel-holder">
				<h1><?php echo $cms_pagina_titel ?></h1>
				<h2>Onderstaande hebben ingelogd of hebben een poging gedaan.</h2>
			</div>

			<table class="accountgegevens" cellspacing="0">
				<tr class="activiteiten titels">
					<th class="gebruiker">Gebruikersnaam</th>
					<th class="wachtwoord">Wachtwoord</th>
					<th class="tijd">Tijd</th>
					<th class="ip">Ip adres</th>
					<th></th>
				</tr>
				<?php

				foreach ($activities as $activity) {

					if ($activity->verwijderd != '1') {
						echo "\n";
						echo '<tr class="activiteiten';

						if ($activity->isuser) {
							// gebruikersnaam komt overeen
							echo ' goed';
						}

						echo '"><td class="gebruiker">' . $activity->gebruikersnaam . '</td><td class="wachtwoord">' . $activity->wachtwoord . '</td><td class="tijd">' . $activity->tijd . '</td><td class="ip">';

						if ($activity->ip != "Onbekend") {
							echo '<a target="_blank" title="ip adres" href="http://www.ip-tracker.org/locator/ip-lookup.php?ip=' . $activity->ip . '">' . $activity->ip . '</a>';
						} else {
							echo $activity->ip;
						}

						echo '</td><td class="icoon"><a href="activiteiten_verwijderen.php?activiteitid=' . $activity->id . '" onclick="return confirm(\'Echt verwijderen?\')" title="Verwijderen"><i class="fa fa-times-circle"></i></a></td></tr>';
					}
				}

				?>
			</table>
		</div>
	</div>
	<div class="cleared"></div>
	<?php include("cms_footer.php"); ?>


	<script>
		$('.show_ingelogd').click(function() {
			$('.activiteiten.goed').toggleClass('show');
			$('.fa-eye').toggleClass('fa-eye-slash');
		});

		$('.optieknop').click(function() {
			$(this).toggleClass('optieknop_active');
		});
	</script>



</body>

</html>