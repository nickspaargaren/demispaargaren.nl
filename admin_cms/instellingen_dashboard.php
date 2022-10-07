<?php
require_once("sessie.php");
$cms_pagina_titel = 'Dashboard instellingen';
include_once("../instellingen.php");
require("cms_head.php");
?>

<body>
<?php require("cms_nav.php") ?>

<div class="cms_inhoud">
	<div class="cms_container vb">

		<div class="titel-holder">
			<h1><?php echo $cms_pagina_titel ?></h1>
			<h2>De blokken die getoond worden in het dashboard. <a href="instellingen.php">Terug naar de algemene instellingen.</a></h2>
		</div>

		<!--   form    -->
		<form action="instellingen_dashboard_opslaan.php" method="post">
      <table class="instellingen dashboard">



<?php
// Suggesties op Dashboard
echo '<tr><td class="checkbox"><label><input type="checkbox" value="1" name="dashb_suggesties" ';
if($tab_gebruikergegevens['dashb_suggesties'] == 1){
	echo 'checked="checked"';
}
echo ' />  <h3 class="titelvraag" style="display: inline-block;">Suggesties</h3></label></td></tr>';
?>
      </table>
			<div><button type="submit" class="cms_button" value="Opslaan"><i class="fa fa-save"></i>Opslaan</button></div>
		</form>
	</div>
</div>
<div class="cleared"></div>
<?php include ("cms_footer.php"); ?>
</body>
</html>
