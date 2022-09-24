<?php
// social media gegevens ophalen
$query = "SELECT * FROM links";
$sql_links = $mysqli->query($query) ;
$tab_links = $sql_links->num_rows;

$array = array();

if($tab_links != 0) {
  while($tab_links = $sql_links->fetch_assoc()) {
	 $array[] = $tab_links;
  }
}

$facebooklink = $array[0]['url'];
$twitterlink = $array[1]['url'];
$googlepluslink = $array[2]['url'];
$instagramlink = $array[3]['url'];


// tellen hoeveel er ingevuld zijn
$tellen = 0;

if ($facebooklink != NULL)  {$tellen++;}
if ($twitterlink != NULL)   {$tellen++;}
if ($googlepluslink != NULL){$tellen++;}
if ($instagramlink != NULL) {$tellen++;}

// echo '<span style="display: none;">'.$tellen.'</span>';

// als er minimaal 1 socail media is ingevuld dan
// wordt het blok getoond

if ($tellen != NULL) {
	echo '<div class="vak social"><div class="inhoud">';
	// echo '<h2>Social Media</h2>';

	if ($tellen == 1) {
		$socialbreedte = '100%';
	}

	if ($tellen == 2) {
		$socialbreedte = '50%';
	}

	if ($tellen == 3) {
		$socialbreedte = '33%';
	}

	if ($tellen == 4) {
		$socialbreedte = '25%';
	}

	// vullen van socialmedia
	if ($facebooklink != NULL) {
		echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/template/link.php?link=facebook&url=https://fb.com/'.$facebooklink.'" target="_blank" class="sociallink facebook" style="width: '.$socialbreedte.'">';
		echo '<span class="icoon"><i class="fa fa-facebook"></i></span>';
		echo '<h3 class="socialtitel">Facebook</h3>';
		echo '</a>';
	}

	if ($twitterlink != NULL) {
		echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/template/link.php?link=twitter&url=https://twitter.com/'.$twitterlink.'" target="_blank" class="sociallink twitter" style="width: '.$socialbreedte.'">';
		echo '<span class="icoon"><i class="fa fa-twitter"></i></span>';
		echo '<h3 class="socialtitel">Twitter</h3>';
		echo '</a>';
	}

	if ($googlepluslink != NULL) {
		echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/template/link.php?link=googleplus&url=https://plus.google.com/%2b'.$googlepluslink.'" target="_blank" class="sociallink googleplus" style="width: '.$socialbreedte.'">';
		echo '<span class="icoon"><i class="fa fa-google-plus"></i></span>';
		echo '<h3 class="socialtitel">Google Plus</h3>';
		echo '</a>';
	}

	if ($instagramlink != NULL) {
		echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/template/link.php?link=instagram&url=https://instagram.com/'.$instagramlink.'" target="_blank" class="sociallink instagram" style="width: '.$socialbreedte.'">';
		echo '<span class="icoon"><i class="fa fa-instagram"></i></span>';
		echo '<h3 class="socialtitel">Instagram</h3>';
		echo '</a>';
	}

	echo '<div class="cleared"></div>';
	echo '</div></div>';
}

?>
