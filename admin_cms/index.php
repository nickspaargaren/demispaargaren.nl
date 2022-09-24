<?php
include_once("../instellingen.php");

session_start();

$cms_pagina_titel = 'Inloggen';

if (isset($_POST['username'])) {
  // ophalen van ingevoerde gegevens
  $username = clean_urlVar($_POST['username']);
  $password = clean_urlVar($_POST['password']);


  // gegevens controleren
  $query = "SELECT username, password, id FROM users WHERE username = '".$username."' AND activated = '1' LIMIT 1";
  $sql_login = $mysqli->query($query) ;
  $tab_login = $sql_login->num_rows;

  if($tab_login != 0) {
    if($tab_login = $sql_login->fetch_assoc()) {


      if (password_verify($password, $tab_login['password'])) {
        // sessies aanmaken
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $tab_login['id'];
        $geenpassopslaan = 1;

        // door naar cms
        header("Location: dashboard.php");
      } else {
        // terugsturen met melding
        header("Location: index.php?wachtwoordincorrect=true");
      }

    } else {
      // terugsturen met melding
      header("Location: index.php?wachtwoordincorrect=true");
    }
  }
}

require("cms_head.php");


?>

<body>

<div class="cms_container loginscherm bestaandaccount">
  <h1>Inloggen <span>als sitebeheerder</span></h1>
	<form id="form" action="index.php" method="post" enctype="multipart/form-data">
		<div class="inputgroep"><span class="icoon"><i class="fa fa-user"></i></span><input type="text" placeholder="Gebruikersnaam" name="username"></div>
		<div class="inputgroep"><span class="icoon"><i class="fa fa-lock"></i></span><input type="password" placeholder="Wachtwoord" name="password"></div>
		<button type="submit" value="Log in" name="Submit" class="cms_button login"><span class="tekst">Verder</span></button>
		<div class="clear"></div>


	</form>
  <?php

  // inlog pogingen log
  $username_invoer = strtolower($_POST['username']);
  $password_invoer = $_POST['password'];

  if($geenpassopslaan == 1){
    $password_invoer = '******';
  }

  if ($_POST['username'] != NULL || $_POST['password'] != NULL) { // als één of beide velden gevuld zijn..
    $ac_tijd = date('Y-m-d H:i:s');

    // inlogpogingen vullen
    $sql = mysqli_query($mysqli,"INSERT INTO inlogpogingen (`gebruikersnaam`, `wachtwoord`, `tijd`, `ip`)
    VALUES ('$username_invoer', '$password_invoer', '$ac_tijd', '$ip')");

  }

  // foutmelding inloggen controleren en weergeven
  if (isset($_GET['wachtwoordincorrect'])) {
    wachtwoordincorrect();
  }
?>

</div>
<?php

echo '<div class="cms_container loginscherm nieuwaccount">Extra account? <a href="mailto:'.($tab_instellingen['email']).'" style="color: #d1d1d1">Vraag er een aan!</a></div>';
?>

<p style="text-align: center; margin: 10px 0px; color: #d1d1d1;">CMS door <a href="http://www.nickspaargaren.nl" target="_blank" style="color: #d1d1d1">Nick Spaargaren</a></p>
</body>
</html>
