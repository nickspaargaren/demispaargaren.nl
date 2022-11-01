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
				<?php echo '<h2>Bijgewerkt: ' . $gebruikergegevens->laatst_bewerkt . '</h2>'; ?>
			</div>


			<form action="account_opslaan.php" method="post">
				<div class="titelvraag">Gebruikersnaam</div>
				<div><input type="text" name="gebruikersnaam" value="<?php echo $gebruikergegevens->username; ?>" placeholder="" required /></div>

				<div class="titelvraag">Wachtwoord</div>
				<div><input type="text" name="wachtwoord" placeholder="Maak een nieuw wachtwoord" required /></div>

				<div class="titelvraag">Voornaam</div>
				<div><input type="text" name="voornaam" value="<?php echo $gebruikergegevens->firstname; ?>" placeholder="" required /></div>

				<div class="titelvraag">Achternaam</div>
				<div><input type="text" name="achternaam" value="<?php echo $gebruikergegevens->lastname; ?>" placeholder="" required /></div>

				<div class="titelvraag">Email</div>
				<div><input type="text" name="email" value="<?php echo $gebruikergegevens->email; ?>" placeholder="" required /></div>

				<button type="submit" class="cms_button" value="Opslaan"><i class="fa fa-save"></i>Opslaan</button>
			</form>
		</div>
		<?php

		// als je als Admin bent ingelogd.
		if ($gebruikergegevens->admin == 1) {
			echo '<div class="cms_container instellingen">';
			include("account_alle.php");
			echo '</div>';
		}

		?>
	</div>
	<div class="cleared"></div>
	<?php include("cms_footer.php"); ?>
</body>

</html>