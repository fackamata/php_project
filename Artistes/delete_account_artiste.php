<?php
require "./../config.php"; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Artistes.php'; //Import du fichier contenant les fonctions BDD associé aux Artistes
session_start(); //Lncement de la session
$res = login_artiste($_SESSION["pseudoartiste"]); //Récupère le mot de passe de l'artiste avec la fonctin de login
$test = password_verify($_POST['supprpass'], $res['motdepasseartiste']); //Vérification des 2 mot de passes 
if($test){
    delete_artiste($_SESSION['pseudoartiste']); //Suppresion du compte Artiste
    header('Location: ./../Utils/logout.php'); //Déconnexion de la session
}
?>
