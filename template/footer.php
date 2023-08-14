<div class="vak footer">
    <div class="inhoud">
        <?php echo $settings->footer; ?>
        <div class="cleared"></div>
    </div>
</div>

<div class="vak subfooter">
    <div class="inhoud">
        <p>&copy; <?php echo $copyright;
                    if ($settings->projectnaam != NULL) {
                        echo ' | ' . $settings->projectnaam;
                    } ?></p>
    </div>
</div>
