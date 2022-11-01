<?php
require_once("sessie.php");
$cms_pagina_titel = 'Uitloggen';

include_once("../instellingen.php");

session_destroy();
if (isset($_SESSION['username'])) {
	$msg = "U bent nu uitgelogd.";
} else {
	$msg = "U bent niet uitgelogd.";
}

require("cms_head.php");
?>

<body>

	<div class="cms_container loginscherm">
		<h1>Uitloggen</h1>
		<?php echo $msg; ?><br><br>
		<a href="index.php">Klik hier</a> om terug te gaan.

	</div>
	<p style="text-align: center; margin: 10px 0px; color: #d1d1d1;">Tot ziens!</p>
</body>

</html>