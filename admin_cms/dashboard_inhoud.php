<?php
require_once("sessie.php");
$cms_pagina_titel = 'Dashboard';
include_once("../instellingen.php");
?>

	<div class="cms_container drie">

		<h2><?php echo $cms_pagina_titel; ?></h2>
		<p>Ingelogd als: <strong><?php echo $usname; ?></strong></p>
		<p>Id: <strong><?php echo $id; ?></strong></p>
		<p>Mijn ip adress: <strong><?php echo $ip; ?></strong></p>
		<a href="<?php echo $base; ?>" class="cms_button" target="_blank">Naar de hompage</a>
	</div>
	<?php

if($gebruikergegevens->dashb_suggesties == 1){
// Suggesties
echo '<!-- Suggesties -->
<div class="cms_container drie">
	<h2>Suggesties?</h2>
	<p>Suggesties of idee&euml;n om in een van deze blokken te tonen? Ik hoor het graag :-)</p>
	<a class="cms_button" href="mailto:info@nickspaargaren.nl">info@nickspaargaren.nl</a>
</div>';
}

?>
<div class="cleared"></div>

</div>

</script>
