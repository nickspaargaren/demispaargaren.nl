<?php
$actual_link = $_SERVER["REQUEST_URI"];

// site is niet actief
if($settings->siteonline==0){
	include_once("niet_actief.php");
	exit;
}

// neppe links naar home
if ($actual_link != '/'){
	$actual_link = ltrim ($actual_link, '/');
} else {
	$actual_link = 'home';
}
if ($actual_link == "index.php"){
	$actual_link = 'home';
}


$query = "SELECT * FROM paginas WHERE link='$actual_link'";
$sql_paginas = $mysqli->query($query);
$tab_paginas = $sql_paginas->num_rows;

if($tab_paginas != 0) {
	if($tab_paginas = $sql_paginas->fetch_assoc()) {
		$pagina_titel = $tab_paginas['titel'];
		$header = $tab_paginas['header'];
		$inhoud = $tab_paginas['content'];
	}
}

require ('head.php');

?>
<body>
<?php
if($settings->headertonen == 1){
	echo '<div class="vak header">
		<div class="inhoud">'.$header.'</div>
	</div>';
}

?>

<div class="vak">
<div class="navigatie">
	<div class="navbutton"><i class="fa fa-bars"></i> <span class="naam">Demi Spaargaren</span></div>
	<a href="/" class="logo"><img  src="images/logo.png?nieuw" alt=""></a>
	
	<div class="nav">
		<?php include_once ('navigatie.php'); ?>
		<div class="social">
			<a target="_blank" href="https://www.fb.com/demispaargaren"><i class="fa fa-facebook-square"></i></a>
			<a target="_blank" href="https://www.linkedin.com/in/demi-spaargaren-03b6b2107"><i class="fa fa-linkedin-square"></i></a>
			<a target="_blank" href="https://twitter.com/spaargarendemi"><i class="fa fa-twitter-square"></i></a>
			<a target="_blank" href="https://instagram.com/demispaargaren.nl"><i class="fa fa-instagram"></i></a>
		</div>
		
	</div>

	</div>
	<div class="inhoud">
		<?php echo $inhoud;?>
	</div>
</div>
<?php

if($settings->afbeeldingentonen == 1){

	echo ' <div class="vak portfolio"><div class="inhoud">';

		// Afbeeldingen ophalen
		$query = "SELECT link, omschrijving FROM afbeeldingen ORDER BY omschrijving ASC";
		$sql_afbeeldingen = $mysqli->query($query) ;
		$tab_afbeeldingen = $sql_afbeeldingen->num_rows;

		if($tab_afbeeldingen != 0) {
		  while($tab_afbeeldingen = $sql_afbeeldingen->fetch_assoc()) {

				echo '<div class="item">
					<div class="afbeelding">
						<img src="../uploads/'.$tab_afbeeldingen['link'].'">
					</div>';

					if ($tab_afbeeldingen['omschrijving'] != NULL){
							echo '<div class="beschrijving"><p>'.$tab_afbeeldingen['omschrijving'].'</p></div>';
					}

				echo '</div>';
		  }
		}

echo '<div class="cleared"></div></div></div>';

}



// include_once ('footer.php');
include_once ('scripts.php');
?>

<div class="overlay"></div>
</body>
</html>
