<?php
require "./../config.php"; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require BASE_PATH."/fonctionsBDD/Comments.php"; //Import du fichier contenant les fonctions BDD associé aux Types
session_start(); //Lncement de la session
$res = delete_comment($_SESSION['idclient']); //Suppression du commentaire en BDD
header('Location: ./../Oeuvres/show_artwork.php?idoeuvre='.$_POST['idoeuvre']); //Redirection sur la page de l'oeuvre précédente
?>