<!DOCTYPE html>
<html lang="nl">

<?php
if ($currentPage->link == 'home') {
	$canonicalUrl = $base;
} else {
	$canonicalUrl = $base . $currentPage->link;
}
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--	<?php echo $cms_versie; ?> 	-->
	<title><?php echo $currentPage->titel ?> | <?php echo $settings->projectnaam ?></title>
	<meta name="author" content="<?php echo $settings->auteur; ?>">
	<meta name="description" content="<?php echo $currentPage->meta_description ?>">
	<link rel="canonical" href="<?php echo $canonicalUrl; ?>">
	<link href="<?php echo $base ?>template/style.css?nieuw" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $base ?>template/favicon.ico" />
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="<?php echo $base ?>assets/components/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.typekit.net/mup3tnf.css">
	<?php echo $settings->hotjar; ?>

</head>