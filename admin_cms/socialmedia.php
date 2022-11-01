<?php
require_once("sessie.php");
$cms_pagina_titel = 'Social Media';
include_once("../instellingen.php");
require("cms_head.php");

// social media gegevens ophalen
$handle = $pdo->prepare("SELECT url FROM links");
$handle->execute();
$links = $handle->fetchAll(PDO::FETCH_OBJ);

$facebooklink = $links[0]->url;
$twitterlink = $links[1]->url;
$googlepluslink = $links[2]->url;
$instagramlink = $links[3]->url;

?>

<body>
	<?php require("cms_nav.php") ?>

	<div class="cms_inhoud">
		<div class="cms_container vb">
			<div class="titel-holder">
				<h1><?php echo $cms_pagina_titel ?></h1>
				<h2>Alle active social media.</h2>
			</div>
			<form action="socialmedia_opslaan.php" method="post">
				<h3 class="titelvraag">Facebook</h3>
				<div class="inlineinput">
					<div class="inputgroep"><span class="tekst">facebook.com/</span><input type="text" name="facebook" value="<?php echo $facebooklink; ?>" placeholder="gebruikersnaam" /></div>
				</div>

				<h3 class="titelvraag">Twitter</h3>
				<div class="inlineinput">
					<div class="inputgroep"><span class="tekst">twitter.com/</span><input type="text" name="twitter" value="<?php echo $twitterlink; ?>" placeholder="gebruikersnaam" /></div>
				</div>

				<h3 class="titelvraag">Google Plus</h3>
				<div class="inputgroep"><span class="tekst">plus.google.com/+</span><input type="text" name="googleplus" value="<?php echo $googlepluslink; ?>" placeholder="gebruikersnaam" /></div>

				<h3 class="titelvraag">Instagram</h3>
				<div class="inputgroep"><span class="tekst">instagram.com/</span><input type="text" name="instagram" value="<?php echo $instagramlink; ?>" placeholder="gebruikersnaam" /></div>

				<button type="submit" class="cms_button" value="Opslaan"><i class="fa fa-save"></i>Opslaan</button>
			</form>
			<style>
				.cms_container input {
					width: 250px;
				}
			</style>
		</div>
	</div>
	<div class="cleared"></div>
	<?php include("cms_footer.php"); ?>
</body>

</html>