<?php
require_once("sessie.php");
$cms_pagina_titel = 'Dashboard';
include_once("../instellingen.php");
require("cms_head.php");
?>

<body>
	<?php require("cms_nav.php") ?>

	<div class="cms_inhoud" id="inhoud"></div>

	<?php include("cms_footer.php"); ?>
	<script>
		$('#inhoud').html('<p style="text-align: center;"><img src="images/laden.svg" /></p>');
		$.ajax({
			url: "dashboard_inhoud.php"
		}).done(function(data) {
			$('#inhoud').html(data);
		});
	</script>
</body>

</html>