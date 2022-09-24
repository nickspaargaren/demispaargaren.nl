<div class="titel-holder">
			<h1>Alle accounts</h1>
			<h2>Een overzicht van alle accounts. Maak gerust een extra account aan!</h2>
		</div>
<?php


// accounts ophalen
$query = "SELECT * FROM users";
$sql_accounts = $mysqli->query($query) ;
$tab_accounts = $sql_accounts->num_rows;

echo '<div id="accounts">';

if($tab_accounts != 0) {
  while($tab_accounts = $sql_accounts->fetch_assoc()) {
	if ($tab_accounts['id'] != 1){

		$gebruiker = '<div class="gebruiker"><form action="accounts_opslaan.php?accountid=' . $tab_accounts['id'] . '" method="post">';

		// gebruikers
		$gebruiker .= '<input type="text" name="gebruikersnaam_alle" value="' . $tab_accounts['username'] . '" placeholder="Gebruikersnaam"/>';

		// wachtwoorden
		$gebruiker .= '<input type="text" name="wachtwoord_alle" placeholder="Maak een nieuw wachtwoord"/>';

		// opslaan
		$gebruiker .= '<button type="submit" title="Opslaan"><i class="fa fa-save"></i></button>';

		// verwijderen
		$gebruiker .= '<a href="accounts_verwijderen.php?accountid=' . $tab_accounts['id'] . '" onclick="return confirm(\'Echt verwijderen?\')" title="Verwijderen"><i class="fa fa fa-times-circle"></i></a>';

		$gebruiker .= '</form></div>';
		echo "\n";
		echo $gebruiker;
	  }
	}
}

echo '</div>';
echo "\n";
echo '<a id="nieuwveld" class="cms_button">Nieuw account</a>';

?>
<script>
$('#nieuwveld').click(function(){
  $('#accounts').append('<div class="gebruiker"><form action="accounts_opslaan.php?nieuw=1&accountid="<?php echo $nieuwaccount; ?>" method="post"><input type="text" name="gebruikersnaam_alle" value="" placeholder="Gebruikersnaam"/><input type="text" name="wachtwoord_alle" value="" placeholder="Wachtwoord" /><button type="submit"><i class="fa fa-save"></i></button></form></div>');
  $('#nieuwveld').addClass('uit');
});
</script>
