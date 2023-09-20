<?php
require_once("sessie.php");
$cms_pagina_titel = 'Pagina\'s';
include_once("../instellingen.php");
require("cms_head.php");
?>

<body>
	<?php require("cms_nav.php") ?>

	<div class="cms_inhoud">
		<div class="cms_container vb">
			<div class="titel-holder">
				<h1>Overzicht van de pagina's</h1>
				<h2>Hier kun je pagina's inzien maar natuurlijk ook nieuwe pagina's aanmaken. Waar gaat je nieuwe pagina over?</h2>
			</div>

			<!-- Alle paginas -->
			<?php

			if (isset($_POST["submit"])) {

				$list = explode(',', $_POST['row_order']);

				for ($i = 0; $i < count($list); $i++) {

					$query = $pdo->prepare("UPDATE paginas SET volgorde = :volgorde WHERE id = :id");
					$query->execute([
						':volgorde' => $i,
						':id' => $list[$i]
					]);
				}
			}

			$query = $pdo->prepare("SELECT * FROM paginas ORDER BY volgorde");
			$query->execute();
			$pages = $query->fetchAll(PDO::FETCH_OBJ);

			?>
			<form name="frmQA" method="POST" />
			<input type="hidden" name="row_order" id="row_order" />
			<div id="sortable-row">
				<?php
				foreach ($pages as $page) {

					echo '
					<div class="projectHolder" id="' . $page->id . '">
						<a href="paginas_detail.php?pagina=' . $page->id . '" class="link"></a>
						<div>
							<div class="volgorde_icoon">
								<i class="fa fa-bars"></i>
							</div>
							<div class="projectNaam">' . $page->titel;

							// De datum is minder dan een dag / week aangemaakt, daarna gaat het label automatisch weg
							if (strtotime($page->timestamp) > strtotime("-1 day")) {
								echo '<span class="nieuw">Nieuw</span>';
							}

					echo '
							</div>
						</div>
						<div>
							<div class="projectStartDatum">' . $page->aanmaakdatum . '</div>
							<a href="http://' . $_SERVER['HTTP_HOST'] . '/' . ($page->link) . '" class="projectBekijken" target="_blank">Bekijken</a>
							<a href="paginas_detail.php?pagina=' . $page->id . '" class="projectWijzigen">Wijzigen</a>
						</div>
					</div>';
					echo "\n";
				}

				?>
			</div>
			<a href="paginas_detail.php?pagina=nieuw" class="cms_button">Nieuwe pagina</a>
			<button type="submit" onclick="saveOrder();" name="submit" class="cms_button grijs" style="border: none !important;"><i class="fa fa-bars"></i>Volgorde opslaan</button>
			</form>

			<script>
				$(function() {
					$('#sortable-row').sortable({
						placeholder: "ui-state-highlight"
					});
				});

				function saveOrder() {
					var selectedLanguage = new Array();
					$('#sortable-row .projectHolder').each(function() {
						selectedLanguage.push($(this).attr("id"));
					});
					document.getElementById("row_order").value = selectedLanguage;
				}
			</script>
		</div>
	</div>
	<div class="cleared"></div>
	<?php include("cms_footer.php"); ?>
</body>

</html>