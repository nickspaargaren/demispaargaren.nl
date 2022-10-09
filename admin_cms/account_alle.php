<div class="titel-holder">
			<h1>Alle accounts</h1>
			<h2>Een overzicht van alle accounts. Maak gerust een extra account aan!</h2>
		</div>
<?php


// Accounts ophalen
$handle = $pdo->prepare("SELECT id, username FROM users");
$handle->execute();
$all_accounts = $handle->fetchAll(PDO::FETCH_OBJ);

echo '<div id="accounts">';

foreach($all_accounts as $account){
	if ($account->id != 1){

		$gebruiker = '<div class="gebruiker"><form action="accounts_opslaan.php?accountid=' . $account->id . '" method="post">';

		// gebruikers
		$gebruiker .= '<input type="text" name="gebruikersnaam_alle" value="' . $account->username . '" placeholder="Gebruikersnaam"/>';

		// wachtwoorden
		$gebruiker .= '<input type="text" name="wachtwoord_alle" placeholder="Maak een nieuw wachtwoord"/>';

		// opslaan
		$gebruiker .= '<button type="submit" title="Opslaan"><i class="fa fa-save"></i></button>';

		// verwijderen
		$gebruiker .= '<a href="accounts_verwijderen.php?accountid=' . $account->id . '" onclick="return confirm(\'Echt verwijderen?\')" title="Verwijderen"><i class="fa fa fa-times-circle"></i></a>';

		$gebruiker .= '</form></div>';
		echo "\n";
		echo $gebruiker;
	}
}

echo '</div>';
echo "\n";
echo '<a id="nieuwveld" class="cms_button">Nieuw account</a>';

?>
<script>
$('#nieuwveld').click(function(){
  $('#accounts').append('<div class="gebruiker"><form action="accounts_opslaan.php?nieuw=1&accountid="0" method="post"><input type="text" name="gebruikersnaam_alle" value="" placeholder="Gebruikersnaam"/><input type="text" name="wachtwoord_alle" value="" placeholder="Wachtwoord" /><button type="submit"><i class="fa fa-save"></i></button></form></div>');
  $('#nieuwveld').addClass('uit');
});
</script>
