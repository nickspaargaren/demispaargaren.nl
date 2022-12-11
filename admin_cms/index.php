<?php
include_once("../instellingen.php");

session_start();

$cms_pagina_titel = 'Inloggen';

$username = isset($_POST['username']) ? $_POST['username'] : 'wer';
$password = isset($_POST['password']) ? $_POST['password'] : 'wer';

if ($username !== '' && $password !== '') {

  // ophalen van ingevoerde gegevens
  $handle = $pdo->prepare("SELECT username, password, id FROM users WHERE username = :username AND activated = '1' LIMIT 1");
  $handle->execute([':username' => $username]);
  $login = $handle->fetch(PDO::FETCH_OBJ);

  if ($login) {
    if (password_verify($password, $login->password)) {
      // sessies aanmaken
      $_SESSION['username'] = $login->username;
      $_SESSION['id'] = $login->id;
      logLoginAtempts($pdo, $username, '******');

      // door naar cms
      header("Location: dashboard.php");
    } else {
      logLoginAtempts($pdo, $username, $password);
      header("Location: index.php");
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
    </form>
  </div>
  <?php

  echo '<div class="cms_container loginscherm nieuwaccount">Extra account? <a href="mailto:' . ($settings->email) . '" style="color: #d1d1d1">Vraag er een aan!</a></div>';
  ?>

  <p style="text-align: center; margin: 10px 0px; color: #d1d1d1;">CMS door <a href="http://www.nickspaargaren.nl" target="_blank" style="color: #d1d1d1">Nick Spaargaren</a></p>
</body>

</html>