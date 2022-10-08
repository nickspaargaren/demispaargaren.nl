<div class="vak footer">
	<div class="inhoud">
		<?php echo $settings->footer; ?>
		<div class="cleared"></div>
	</div>
</div>

<div class="vak subfooter">
	<div class="inhoud">
		<p>&copy; <?php echo $copyright; if ($settings->projectnaam != NULL) { echo ' | ' . $settings->projectnaam; } ?></p>
	</div>
</div>

<style>
@font-face {
    font-family: 'geomanist_regularregular';
    src: url('../template/fonts/geomanist-regular-webfont.eot');
}

@font-face {
    font-family: 'geomanist_regularregular';
    src: url('../template/fonts/geomanist-regular-webfont.ttf') format('truetype'),
         url('../template/fonts/geomanist-regular-webfont.svg#geomanist_regularregular') format('svg');
    font-weight: normal;
    font-style: normal;
}
</style>
