<?php
session_start();
$cms_pagina_titel = 'Relaties';

if (isset($_SESSION['id'])) {
// Put stored session variables into local PHP variable
$id = $_SESSION['id'];
$usname = $_SESSION['username'];
} else {
header('Location: index.php');
exit;
}

include_once("../instellingen.php");
require("cms_head.php");

?>

<body>
<?php require("cms_nav.php") ?>



<div class="cms_inhoud">
	<div class="cms_container">
		<div class="titel-holder">
			<h1><?php echo $cms_pagina_titel ?></h1>
			<h2>Een overzicht van alle relaties.</h2>
		</div>
		<!-- Inhoud -->
	</div>
</div>
<div class="cleared"></div>
<?php include ("cms_footer.php"); ?>
</body>
</html>
