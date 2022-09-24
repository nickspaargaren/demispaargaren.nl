<?php
require_once("sessie.php");
$cms_pagina_titel = 'Instellingen';
include_once("../instellingen.php");
require("cms_head.php");

// instellingen gegevens ophalen
$query = "SELECT * FROM instellingen WHERE id=1";
$sql_instellingen = $mysqli->query($query) ;
$tab_instellingen = $sql_instellingen->num_rows;

if($tab_instellingen != 0) {
  if($tab_instellingen = $sql_instellingen->fetch_assoc()) {

  }
}

$projectnaam = $tab_instellingen['projectnaam'];
$auteur = $tab_instellingen['auteur'];
$email = $tab_instellingen['email'];



if($tab_instellingen['zoomen']==1){
	$zoomen = 'checked="checked"';
	$zoomen2 = 'yes';
} else {
	$zoomen = '';
	$zoomen2 = 'no';
}



$description = $tab_instellingen['description'];

$analytics = $tab_instellingen['analytics'];
$footer = $tab_instellingen['footer'];


// Site online
if($tab_instellingen['siteonline']==1){
	$siteonline = 'checked="checked"';
	$siteonline2 = 'yes';
} else {
	$siteonline = '';
	$siteonline2 = 'no';
}

// Afbeeldingen maatwerk tonen
if($tab_instellingen['afbeeldingentonen']==1){
	$afbeeldingentonen = 'checked="checked"';
} else {
	$afbeeldingentonen = '';
}

// Paginaheaders tonen
if($tab_instellingen['headertonen']==1){
	$headertonen = 'checked="checked"';
} else {
	$headertonen = '';
}


?>

<body>
<?php require("cms_nav.php") ?>

<div class="cms_inhoud">
	<div class="cms_container vb">

		<div class="titel-holder">
			<h1><?php echo $cms_pagina_titel ?></h1>
			<h2>Algemene instellingen, contactgegevens, eigenlijk alle belangrijke instellingen van de website.</h2>
      <a href="instellingen_dashboard.php">Instellingen dashboard</a>
		</div>

		<!--   form    -->
		<form action="instellingen_opslaan.php" method="post">
			<table class="instellingen">
				<tr>
					<td>
						<h3 class="titelvraag">Projectnaam:</h3>
						<input type="text" name="projectnaam" value="<?php echo $projectnaam; ?>" placeholder=""/>
					</td>

					<td>
					<h3 class="titelvraag">Auteur:</h3>
					<input type="text" name="auteur" value="<?php echo $auteur; ?>" placeholder=""/></td>

					<td>
					<h3 class="titelvraag">Email:</h3>
					<input type="text" name="email" value="<?php echo $email; ?>" placeholder=""/></td>
				</tr>
        <tr>
          <td colspan="3">
          <h3 class="titelvraag">Website omschrijving (Description):</h3>
          <textarea name="description">
          <?php echo $description; ?>
          </textarea>
          </td>
        </tr>
				<tr>
					<td>
					<h3 class="titelvraag">Zoomen op mobiel?</h3>
					<input type="checkbox" value="1" name="zoomen" <?php echo $zoomen; ?>  /></td>
				</tr>
				<tr>
					<td colspan="3">
						<h3 class="titelvraag">Footer:</h3>
						<textarea name="footer">
						<?php echo $footer; ?>
						</textarea>
						<script>CKEDITOR.replace( 'footer' );</script>
					</td>
				</tr>
				<tr>
					<td>
  					<h3 class="titelvraag">Site online?</h3>
  					<input type="checkbox" value="1" name="siteonline" <?php echo $siteonline; ?>  />
          </td>
          <td>
            <h3 class="titelvraag">Afbeeldingen</h3>
            <label><input type="checkbox" value="1" name="afbeeldingentonen" <?php echo $afbeeldingentonen; ?> /> Alle afbeeldingen tonen op de homepage<br>(Maatwerk)</label>
          </td>
          <td>
            <h3 class="titelvraag">Headers</h3>
            <label><input type="checkbox" value="1" name="headertonen" <?php echo $headertonen; ?> /> Paginaheaders gebruiken</label>
          </td>
				</tr>
			</table>
			<button type="submit" class="cms_button" value="Opslaan"><i class="fa fa-save"></i>Opslaan</button>
		</form>


	</div>
</div>
<div class="cleared"></div>
<?php include ("cms_footer.php"); ?>
</body>
</html>
