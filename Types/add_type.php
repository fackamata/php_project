<?php
require "./../config.php"; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Types.php'; //Import du fichier contenant les fonctions BDD associé aux Types
session_start(); //Lancement de la session

echo "<pre>";
print_r($_POST);
echo "</pre>";

$nomtype = pg_escape_string($_POST['nomtype']);
add_type($nomtype);
header('Location: ./../Artistes/admin_type.php'); //Déconnexion de la session
?>
