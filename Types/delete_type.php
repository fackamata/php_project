<?php
require "./../config.php"; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Types.php'; //Import du fichier contenant les fonctions BDD associé aux Artistes

$idtype = pg_escape_string($_POST['idtype']);
session_start(); //Lancement de la session
delete_type($idtype); //Récupère le mot de passe de l'artiste avec la fonctin de login
header('Location: ./../Artistes/admin_type.php'); //Déconnexion de la session
?>
