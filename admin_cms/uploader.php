<?php
require_once("sessie.php");
$cms_pagina_titel = 'Uploaden..';
include_once("../instellingen.php");

$target_file = "../uploads/" . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

$timestamp = date("Y-m-d H:i:s");
$bestandsgrootte = $_FILES["fileToUpload"]["size"];

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // echo "Bestand is een plaatje - " . $check["mime"] . ". ";
        $uploadOk = 1;
    } else {
        echo 'Je kunt alleen afbeeldingen uploaden.';
        $uploadOk = 0;
        exit;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Bestand bestaat al.";
    $uploadOk = 0;
    exit;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) { // nu max 1mb
    echo "Sorry, je afbeelding is te groot! Maximaal 1MB.";
    $uploadOk = 0;
    exit;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo 'Sorry, je moet echt een JPG of PNG uploaden.';
    $uploadOk = 0;
    exit;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo 'Het bestand is niet geupload.';
    exit;
} else { // if everything is ok, try to upload file

    $file = new file();

    if ($file->upload($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("Location: afbeeldingen.php?melding=" . basename( $_FILES["fileToUpload"]["name"]) . " is toegevoegd.");

        $sql = mysqli_query($mysqli,"INSERT INTO afbeeldingen SET
      	        omschrijving =  '".$_POST['omschrijving']."',
                link =  '".$_FILES["fileToUpload"]["name"]."',
                uploaddatum = '".$timestamp."',
                bestandsgrootte = '".$bestandsgrootte."',
                gebruiker = '".$tab_gebruikergegevens['username']."'
      	        ");

    } else {
        echo 'Sorry, er is iets fout gegaan.';
        exit;
    }
}
?>
