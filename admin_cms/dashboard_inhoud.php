<?php
require_once("sessie.php");
$cms_pagina_titel = 'Dashboard';
include_once("../instellingen.php");
?>

<?php
if(	$tab_gebruikergegevens['dashb_socialclicks'] == 1){

	// Links ophalen
	$query = "SELECT * FROM links";
	$sql_links = $mysqli->query($query) ;
	$tab_links = $sql_links->num_rows;

	if($tab_links != 0) {
	  while($tab_links = $sql_links->fetch_assoc()) {
		echo '<div class="cms_container vier '.$tab_links['link'].'"><div class="sicon" id="'.$tab_links['link'].'refresh"><i class="fa fa-refresh"></i></div>'.$tab_links['naam'].'<span class="aantalclicks">'.$tab_links['clicks'].'</span></div>';
		$array[] = $tab_links;
	  }
	}

}
?>
	<div class="cms_container drie">

		<h2><?php echo $cms_pagina_titel; ?></h2>
		<p>Ingelogd als: <strong><?php echo $usname; ?></strong></p>
		<p>Id: <strong><?php echo $id; ?></strong></p>
		<p>Mijn ip adress: <strong><?php echo $ip; ?></strong></p>
		<a href="<?php echo $base; ?>" class="cms_button" target="_blank">Naar de hompage</a>
	</div>
	<?php

if($tab_gebruikergegevens['dashb_suggesties'] == 1){
// Suggesties
echo '<!-- Suggesties -->
<div class="cms_container drie">
	<h2>Suggesties?</h2>
	<p>Suggesties of idee&euml;n om in een van deze blokken te tonen? Ik hoor het graag :-)</p>
	<a class="cms_button" href="mailto:info@nickspaargaren.nl">info@nickspaargaren.nl</a>
</div>';
}

// Facebook
if($tab_gebruikergegevens['dashb_facebook'] == 1){

	$query = "SELECT * FROM links WHERE id= 1";
	$sql_links = $mysqli->query($query) ;
	$tab_links = $sql_links->num_rows;

	if($tab_links != 0) {
	  if($tab_links = $sql_links->fetch_assoc()) {
			$facebooklink = $tab_links['url'];
		}
	}
	// als Facebook ingevuld is
	if($facebooklink != NULL){

		$facebookblock = '<!-- Facebook progress -->
		<div class="cms_container drie" id="facebook">
		<h2>Facebook, <span style="color: #cecece;">' . $facebooklink . '</span></h2>';



		$fbdoel = $array[0]['doel'];

		// kijken of het doel is ingevuld
		if ($fbdoel > 0) {

			// ingesteld account ophalen
			$fb = facebook_count("https://www.facebook.com/".$facebooklink);

			// procenten berekenen
			$fbprocent = ($fb[0]->like_count/$fbdoel)*100;
			$fbprocent = str_replace(",", ".", $fbprocent);

			// Aantal likes tonen
			$facebookblock .= '<p>' . $fb[0]->like_count . ' likes.<span style="float: right;">';


			// Doel bereikt
			if($fbprocent >= 100){
				// Aantal mag maximaal 100% zijn
				$fbprocent = '100';
				$facebookblock .= 'Doel van ' . $fbdoel . ' likes bereikt!';


			// doel nog niet bereikt
			} else {
				$facebookblock .= 'Met een doel van ' . $fbdoel . '.';
			}

			// progressbalk
			$facebookblock .= '</span></p><div class="balk"><div class="progress" style=""></div></div>';

		} else { // geen doel ingevuld --> melding
			$facebookblock .= '<p>Er is geen doel ingesteld voor de gebruiker ('. $facebooklink . '). Ga naar de pagina <a href="socialmedia.php">\'Social media\'</a> om een doel in te stellen.</p>';
		}

		$facebookblock .= '</div>'; // einde cms_container
		$facebookblock .= "\n\n";

		echo $facebookblock;
	}
}

?>
<div class="cleared"></div>

</div>


<script>

<?php if(	$tab_gebruikergegevens['dashb_socialclicks'] == 1){ ?>
$('#facebookrefresh').click(function(){
	$.get( "socialrefresh.php", function( data ) {
	$( "div.facebook .aantalclicks" ).replaceWith( '<div class="aantalclicks">' + data.facebook + '</div>' );
	$("#facebookrefresh").addClass("disabled");
	}, "json" );
});

$('#twitterrefresh').click(function(){
	$.get( "socialrefresh.php", function( data ) {
	$( "div.twitter .aantalclicks" ).replaceWith( '<div class="aantalclicks">' + data.twitter + '</div>' );
	$("#twitterrefresh").addClass("disabled");
	}, "json" );
});

$('#googleplusrefresh').click(function(){
	$.get( "socialrefresh.php", function( data ) {
	$( "div.googleplus .aantalclicks" ).replaceWith( '<div class="aantalclicks">' + data.googleplus + '</div>' );
	$("#googleplusrefresh").addClass("disabled");
	}, "json" );
});

$('#instagramrefresh').click(function(){
	$.get( "socialrefresh.php", function( data ) {
	$( "div.instagram .aantalclicks" ).replaceWith( '<div class="aantalclicks">' + data.instagram + '</div>' );
	$("#instagramrefresh").addClass("disabled");
	}, "json" );
});

<?php } ?>

// social
var facebook = '<?php if($tab_gebruikergegevens['dashb_facebook'] == 1){ echo $fbprocent; }?>%';

setTimeout( function() {
	$("#facebook .progress").css("width", facebook);
  }, 300);



</script>
