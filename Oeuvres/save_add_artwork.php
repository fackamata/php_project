<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Artworks.php'; 

session_start();  //Lance la session sur le navigateur
// Initialisation des variables pour la fonction d'ajout d'une oeuvre
$nomoeuvre = pg_escape_string($_POST["nomoeuvre"]);
$description = pg_escape_string($_POST["description"]);
$date = pg_escape_string($_POST["date"]);
$idtype = $_POST["type"];
if (!(move_uploaded_file($_FILES['image']['tmp_name'], "../upload/".$_FILES['image']['name']))){ //Vérification de l'upload du fichier image, si erreur alors utilisation d'une image aléatoire
    $_FILES["image"]["name"] = '';
}
$image = pg_escape_string($_FILES["image"]["name"]);
add_artwork($nomoeuvre, $description, $date, $image, $idtype, $_SESSION['idartiste']); //Appel à la fonction d'ajout d'une oeuvre
header('Location: ./../Artistes/artiste_account.php');  //Redirection vers la page de compte de l'artiste
?>