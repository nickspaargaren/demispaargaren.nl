<?php
require_once("sessie.php");
$cms_pagina_titel = 'Paginas';
include_once("../instellingen.php");
require("cms_head.php");
?>

<body>
<?php require("cms_nav.php") ?>
<?php

$pagina = $_GET["pagina"];


if ($pagina == 'nieuw'){ // wanneer een nieuwe pagina word aangemaakt
	$cms_pagina_titel = 'Nieuwe pagina';
	$cms_pagina_titel_2 = 'Waar gaat je nieuwe pagina over?';

	$paginacheck = '?paginacheck=nieuw';

	$pagina_id = '';
	$pagina_titel = '';
	$pagina_link = '';
	$pagina_header = '';
	$pagina_content = '';
	$speciale_button = '';

} else { // bestaande gegevens ophalen

	$query = "SELECT * FROM paginas WHERE id = $pagina";
	$sql_paginas = $mysqli->query($query) ;

	if($sql_paginas->num_rows != 0) {
	  $tab_paginas = $sql_paginas->fetch_assoc();
	}

	$cms_pagina_titel = 'Huidige pagina: '. $tab_paginas['titel'];
	$cms_pagina_titel_2 = '<div class="aanmaakdatum">Aanmaakdatum: ' . $tab_paginas['aanmaakdatum'] . '</div>';

	$pagina_id = $tab_paginas['id'];
	$pagina_titel = $tab_paginas['titel'];
	$pagina_link = $tab_paginas['link'];
	$pagina_header = $tab_paginas['header'];
	$pagina_content = $tab_paginas['content'];

	if ($tab_paginas['speciale_button'] =="1"){
		$speciale_button = 'checked="checked"';
	} else {
		$speciale_button = '';
	}

	$paginacheck = '?paginacheck=' . $pagina;

}

?>
<div class="cms_inhoud">
	<div class="cms_container vb">
		<div class="titel-holder">
			<h1><?php echo $cms_pagina_titel ?></h1>
			<h2><?php echo $cms_pagina_titel_2; ?></h2>
			<?php 
				if ($pagina != 'nieuw') {
					echo '<a target="_blank" href="http://'. $_SERVER['HTTP_HOST']. '/' . $pagina_link . '" class="cms_button paginabekijken"><i class="fa fa-search"></i> Pagina bekijken</a>';
				}
			?>
		</div>
		<form action="paginas_opslaan.php<?php echo $paginacheck; ?>" method="post">
			<table class="instellingen">
				<tr>
					<td>
						<h3 class="titelvraag">Paginatitel</h3>
						<input type="text" name="paginatitel" value="<?php echo $pagina_titel; ?>" placeholder=""/>
					</td>
					<td>
						<h3 class="titelvraag">Paginalink</h3>
						<input type="text" name="paginalink" value="<?php echo $pagina_link; ?>" placeholder="Voorbeeld: home"/>
					</td>

					<td>
						<h3 class="titelvraag">Speciale button?</h3>
						<input type="checkbox" value="1" name="specialebutton" <?php echo $speciale_button; ?>  />
					</td>
				<?php
				if($headertonen == 1){
					echo '<tr><td colspan="3"><h3 class="titelvraag">Header</h3><textarea name="header">' . $pagina_header . '</textarea><script>CKEDITOR.replace( \'header\' );</script></td></tr>';
				}
				?>
				<tr>
					<td colspan="3">
						<h3 class="titelvraag">De inhoud van de pagina</h3>
						<textarea name="content">
						<?php echo $pagina_content; ?>
						</textarea>
						<script>CKEDITOR.replace('content');</script>
					</td>
				</tr>

			</table>
			<button type="submit" class="cms_button" value="Opslaan"><i class="fa fa-save"></i>Opslaan</button><a href="paginas_verwijderen.php?paginacheck=verwijderen&pagina=<?php echo $pagina_id ?>" onclick="return confirm('Echt verwijderen?')" class="cms_button delete" style="margin: 0 0 0 15px"><i class="fa fa-times"></i>Pagina verwijderen?</a>
		</form>
	</div>
</div>
<div class="cleared"></div>
<?php include ("cms_footer.php"); ?>
</body>
</html>
