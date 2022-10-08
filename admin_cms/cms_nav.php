<div class="cms_extranavHolder">
	<div class="cms_extranav">
		<div class="cms_info">
			<div class="bedrijfsnaam"><?php echo $projectnaam ?></div>
			<div class="versie"><?php echo $cms_versie ?></div>
		</div>
		<a class="btn_submenu"><i class="fa fa-navicon"></i></a>

		<div class="account">

			<?php
			// berichten ophalen / notificatie
			$query = "SELECT gelezen FROM formulier";
			$sql_formulier = $mysqli->query($query) ;
			$tab_formulier = $sql_formulier->num_rows;

			$resultaat_formulier = 0;

			if($tab_formulier != 0) {
				while($tab_formulier = $sql_formulier->fetch_assoc()) {
					if ($tab_formulier['gelezen'] != 1 ){$resultaat_formulier++;}
				}
			}
			?>
			<div class="naam">
			<?php echo $gebruikergegevens->firstname . " " . $gebruikergegevens->lastname; ?><i class="fa fa-caret-down"></i></div>
			<ul class="submenu">
				<li><a href="account.php">Mijn account</a></li>

				<?php if($resultaat_formulier > 0){echo '<li><a href="formulier.php">Meldingen <span class="formAantal">' . $resultaat_formulier . '</span></a></li>';} ?>

				<li><a href="<?php echo $base; ?>" target="_blank">Naar de homepagina</a></li>
				<li><a href="logout.php">Uitloggen</a></li>
			</ul>


		</div>
		<div class="cleared"></div>
	</div>
</div>

<div class="cms_navHolder">
	<ul class="cms_nav">
		<li class="item <?php echo $cms_pagina_titel === 'Dashboard' ? 'active' : '' ?>"><a href="dashboard.php"><i class="fa fa-home"></i><span class="titel">Home</span><div class="cleared"></div></a></li>
		<li class="item <?php echo $cms_pagina_titel === 'Pagina\'s' ? 'active' : '' ?>"><a href="paginas.php"><i class="fa fa-sitemap"></i><span class="titel">Pagina's</span><div class="cleared"></div></a></li>
		<li class="item <?php echo $cms_pagina_titel === 'Afbeeldingen' ? 'active' : '' ?>"><a href="afbeeldingen.php"><i class="fa fa-image"></i><span class="titel">Afbeeldingen</span><div class="cleared"></div></a></li>
		<li class="item <?php echo $cms_pagina_titel === 'Contactformulier' ? 'active' : '' ?>"><a href="formulier.php"><?php if($resultaat_formulier > 0){echo '<div class="formAantal">' . $resultaat_formulier . '</div>';} ?><i class="fa fa-file-text-o"></i><span class="titel">Contactformulier</span><div class="cleared"></div></a></li>
		<li class="item <?php echo $cms_pagina_titel === 'Account' ? 'active' : '' ?>"><a href="account.php"><i class="fa fa-user"></i><span class="titel">Account</span><div class="cleared"></div></a></li>
		<li class="item <?php echo $cms_pagina_titel === 'Social Media' ? 'active' : '' ?>"><a href="socialmedia.php"><i class="fa fa-share-alt"></i><span class="titel">Social Media</span><div class="cleared"></div></a></li>
		<li class="item <?php echo $cms_pagina_titel === 'Instellingen' ? 'active' : '' ?>"><a href="instellingen.php"><i class="fa fa-gear"></i><span class="titel">Instellingen</span><div class="cleared"></div></a></li>
		<li class="item <?php echo $cms_pagina_titel === 'Hulp' ? 'active' : '' ?>"><a href="hulp.php"><i class="fa fa-info"></i><span class="titel">Hulp</span><div class="cleared"></div></a></li>
<?php


// extra opties wanneer je als 'Admin' bent ingelogd.
if ($gebruikergegevens->admin == 1) {
	$activiteiten_active = $cms_pagina_titel === 'Activiteiten' ? 'active' : '';
	echo '<li class="item ' . $activiteiten_active . '"><a style="color: orange !important;" href="activiteiten.php"><i style="color: orange !important;" class="fa fa-pie-chart"></i><span class="titel">Activiteiten</span><div class="cleared"></div></a></li>';
}
?>
		<div class="mobile_cleared"></div>

	</ul>
</div>
