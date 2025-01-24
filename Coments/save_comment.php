<?php
require "./../config.php"; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require BASE_PATH."/fonctionsBDD/Comments.php"; //Import du fichier contenant les fonctions BDD associé aux Types
session_start(); //Lancement de la session sur le navigateur
$date = getdate(); //Récupère un tableau ayant les valeurs de la date d'instant t
$datenow = $date['year'].'-'.$date['mon'].'-'.$date['mday']; //Sélection uniquement de l'année, le mois et le jour du moi (1-31)
$message = pg_escape_string($_POST['commentaire']);
$idoeuvre = pg_escape_string($_POST['idoeuvre']);
$res = save_comment($message, $idoeuvre, $_SESSION['idclient'], $datenow); //Enregistrement du commentaire en BDD
if($res){
    header('Location: ./../Oeuvres/show_artwork.php?idoeuvre='.$_POST['idoeuvre']);
}
else{
    header('Location: ./../Oeuvres/show_artwork.php?idoeuvre='.$_POST['idoeuvre']);
}
?>