<?php
require_once("sessie.php");
$cms_pagina_titel = 'Dashboard';


if (isset($_SESSION['id'])) {
// Put stored session variables into local PHP variable
$id = $_SESSION['id'];
$usname = ucfirst(strtolower($_SESSION['username']));
} else {
	header('Location: index.php');
exit;
}
include_once("../instellingen.php");
require("cms_head.php");
?>
<bdoy>
	<div class="cms_container upload">
<form action="uploader.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Uploaden" name="submit">
</form>
</div>
</body>
</html>
