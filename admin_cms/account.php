<?php
require_once("sessie.php");
$cms_pagina_titel = 'Account';
include_once("../instellingen.php");
require("cms_head.php");
?>

<body>
<?php require("cms_nav.php") ?>

<div class="cms_inhoud">
	<div class="cms_container instellingen">
		<div class="titel-holder">
			<h1>Mijn account</h1>
			<?php echo '<h2>Bijgewerkt: ' . $tab_gebruikergegevens['laatst_bewerkt'] . '</h2>'; ?>
		</div>


			<form action="account_opslaan.php" method="post">
						<div class="titelvraag">Gebruikersnaam</div>
						<div><input type="text" name="gebruikersnaam" value="<?php echo $tab_gebruikergegevens['username']; ?>" placeholder=""/></div>

						<div class="titelvraag">Wachtwoord</div>
						<div><input type="text" name="wachtwoord" placeholder="Maak een nieuw wachtwoord" /></div>

						<div class="titelvraag">Voornaam</div>
						<div><input type="text" name="voornaam" value="<?php echo $tab_gebruikergegevens['firstname']; ?>" placeholder=""/></div>

						<div class="titelvraag">Achternaam</div>
						<div><input type="text" name="achternaam" value="<?php echo $tab_gebruikergegevens['lastname']; ?>" placeholder=""/></div>

						<div class="titelvraag">Email</div>
						<div><input type="text" name="email" value="<?php echo $tab_gebruikergegevens['email']; ?>" placeholder=""/></div>

				<button type="submit" class="cms_button" value="Opslaan"><i class="fa fa-save"></i>Opslaan</button>
			</form>
</div>
<?php

// als je als Admin bent ingelogd.
if ($tab_gebruikergegevens['admin'] == 1) {
	echo '<div class="cms_container instellingen">';
	include("account_alle.php");
	echo '</div>';
}

?>
</div>
<div class="cleared"></div>
<?php include ("cms_footer.php"); ?>
</body>
</html>
