<?php
require "./../config.php";  //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Artworks.php';  //Import du fichier contenant les fonctions BDD associé aux Oeuvres

if (!(move_uploaded_file($_FILES['image']['tmp_name'], "../upload/".$_FILES['image']['name']))){ //Vérification de l'upload du fichier image, si erreur alors utilisation d'une image aléatoire
    $_FILES['image']['name'] = '';
}

// Initialisation des variables pour la fonction d'édition
$nomoeuvre = pg_escape_string($_POST['nomoeuvre']);
$descriptionoeuvre = pg_escape_string($_POST['description']);
$dateoeuvre = pg_escape_string($_POST['date']);
$idtype = pg_escape_string($_POST['type']);
$imageoeuvre = pg_escape_string($_FILES['image']['name']);
$idoeuvre = pg_escape_string($_POST['idoeuvre']);

edit_artwork($nomoeuvre, $descriptionoeuvre, $dateoeuvre, $idtype, $imageoeuvre, $idoeuvre); //Appel à la fonction d'edition d'une oeuvre
header('Location: ./../Artistes/artiste_account.php'); //Redirection vers la page de compte de l'artiste
?>