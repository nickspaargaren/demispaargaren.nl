<?php
require_once("sessie.php");
$cms_pagina_titel = 'Hulp';
include_once("../instellingen.php");
require("cms_head.php");
?>

<body>
	<?php require("cms_nav.php") ?>

	<div class="cms_inhoud">
		<div class="cms_container">
			<div class="titel-holder">
				<h1>Hulp & ondersteuning</h1>
				<h2>Contactgegevens en meer.</h2>
			</div>

			<ul>
				<!-- <li>Nick Spaargaren</li> -->
				<!-- <li>06 343 260 53</li> -->
				<li><a href="https://www.nickspaargaren.nl" target="_blank">www.nickspaargaren.nl</a></li>
				<li><a href="mailto:info@nickspaargaren.nl?subject=Vraag&nbsp;over&nbsp;het&nbsp;CMS">info@nickspaargaren.nl</a></li>
				<!-- <li><a href="https://www.fb.com/nickspaargaren" target="_blank">www.fb.com/nickspaargaren</a></li> -->
				<!-- <li><a href="https://www.linkedin.com/pub/nick-spaargaren/32/81/788" target="_blank">Linkedin</a></li> -->
				<!-- <li><a href="https://www.twitter.com/nickspaargaren" target="_blank">www.twitter.com/nickspaargaren</a></li> -->
			</ul>
		</div>
	</div>
	<div class="cleared"></div>
	<?php include("cms_footer.php"); ?>
</body>

</html>