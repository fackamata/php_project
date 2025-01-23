<?php
require "./../config.php";  //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Artworks.php';  //Import du fichier contenant les fonctions BDD associé aux Oeuvres

$idoeuvre = pg_escape_string($_POST['id_oeuvre']); //Nettoyage de l'idoeuvre au vu d'une modification coté client
delete_artwork($idoeuvre); //Appel de la fonction pour supprimer une oeuvre
header('Location: ./../Artistes/artiste_account.php'); //Redirection vers la page de l'artiste
?>