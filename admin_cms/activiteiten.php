<?php
require_once("sessie.php");
$cms_pagina_titel = 'Activiteiten';
include_once("../instellingen.php");
require("cms_head.php");


$query = "SELECT * FROM inlogpogingen ORDER BY tijd DESC";
$sql_activiteiten = $mysqli->query($query);
$tab_activiteiten = $sql_activiteiten->num_rows;

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

<?php

echo '<table class="accountgegevens" cellspacing="0">
	<tr class="activiteiten titels">
		<th class="gebruiker">Gebruikersnaam</th>
		<th class="wachtwoord">Wachtwoord</th>
		<th class="tijd">Tijd</th>
		<th class="ip">Ip adres</th>
		<th></th>
	</tr>';

if($tab_activiteiten != 0) {
  while($tab_activiteiten = $sql_activiteiten->fetch_assoc()) {

		$query = "SELECT * FROM users";
		$sql_accounts = $mysqli->query($query);
		$tab_accounts = $sql_accounts->num_rows;


		if($tab_activiteiten['verwijderd'] != '1'){
			echo "\n";
			echo '<tr class="activiteiten';

			if($tab_accounts != 0) {
			  while($tab_accounts = $sql_accounts->fetch_assoc()) {
					if($tab_activiteiten['gebruikersnaam'] != $tab_accounts['username']){
						// gebruikersnaam komt niet overeen
					} else {
						echo ' goed';
					}
				}
			}

	echo '"><td class="gebruiker">' . $tab_activiteiten['gebruikersnaam'] . '</td><td class="wachtwoord">' . $tab_activiteiten['wachtwoord'] . '</td><td class="tijd">' . $tab_activiteiten['tijd'] . '</td><td class="ip">';

	if($tab_activiteiten['ip'] != "Onbekend"){
		echo '<a target="_blank" title="ip adres" href="http://www.ip-tracker.org/locator/ip-lookup.php?ip=' . $tab_activiteiten['ip'] . '">' . $tab_activiteiten['ip'] . '</a>';
	} else {
		echo $tab_activiteiten['ip'];
	}

	echo '</td><td class="icoon"><a href="activiteiten_verwijderen.php?activiteitid=' . $tab_activiteiten['id'] . '" onclick="return confirm(\'Echt verwijderen?\')" title="Verwijderen"><i class="fa fa-times-circle"></i></a></td></tr>';
		}
  }
}


echo '</table>';

?>
</div>
</div>
<div class="cleared"></div>
<?php include ("cms_footer.php"); ?>


<script>

$('.show_ingelogd').click(function(){
  $('.activiteiten.goed').toggleClass('show');
  $('.fa-eye').toggleClass('fa-eye-slash');
});

$('.optieknop').click(function(){
	$(this).toggleClass('optieknop_active');
});

</script>



</body>
</html>
