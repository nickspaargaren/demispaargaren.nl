<?php
require_once("sessie.php");
$cms_pagina_titel = 'Instellingen';
include_once("../instellingen.php");
require("cms_head.php");
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
						<input type="text" name="projectnaam" value="<?php echo $settings->projectnaam; ?>" placeholder=""/>
					</td>

					<td>
					<h3 class="titelvraag">Auteur:</h3>
					<input type="text" name="auteur" value="<?php echo $settings->auteur; ?>" placeholder=""/></td>

					<td>
					<h3 class="titelvraag">Email:</h3>
					<input type="text" name="email" value="<?php echo $settings->email; ?>" placeholder=""/></td>
				</tr>
        <tr>
          <td colspan="3">
          <h3 class="titelvraag">Website omschrijving (Description):</h3>
          <textarea name="description">
          <?php echo $settings->description; ?>
          </textarea>
          </td>
        </tr>
				<tr>
					<td colspan="3">
						<h3 class="titelvraag">Footer:</h3>
						<textarea name="footer">
						<?php echo $settings->footer; ?>
						</textarea>
						<script>CKEDITOR.replace( 'footer' );</script>
					</td>
				</tr>
				<tr>
					<td>
  					<h3 class="titelvraag">Site online?</h3>
  					<input type="checkbox" value="1" name="siteonline" <?php echo checked($settings->siteonline); ?>  />
          </td>
          <td>
            <h3 class="titelvraag">Headers</h3>
            <label><input type="checkbox" value="1" name="headertonen" <?php echo checked($settings->headertonen); ?> /> Paginaheaders gebruiken</label>
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
