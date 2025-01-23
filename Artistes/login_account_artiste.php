<?php
require "./../config.php"; ////Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH."/fonctionsBDD/Artistes.php"; //Import du fichier contenant les fonctions BDD associé aux Artistes
$pseudo = pg_escape_string($_POST["pseudo"]);
$password = $_POST["password"];
session_start(); //Lance la session sur le navigateur
$listpseudo = get_all_artiste_pseudo(); //Récupère la liste de tt les pseudo artistes
if(!in_array($pseudo, $listpseudo)){ //Vérifie la présence du pseudo dans la liste (negation)
    header('Location: ./connection_artiste.php?etat=error'); //Redirection en cas de non présence
}

$res = login_artiste($pseudo); //Fonction de login artiste (récupération de mdp et login)

$test = password_verify($password, $res["motdepasseartiste"]); //Vérification de compatibilité des mot de passes

if($test){
    $_SESSION['idartiste'] = $res['idartiste']; //Initialisation de la SESSION
    $_SESSION['pseudoartiste'] = $res['pseudoartiste'];
    header('Location: ./artiste_account.php'); //Redirectin vers la page de compte artiste
}
else{
    header('Location: ./connection_artiste.php?etat=error'); //Redirectin vers la page de compte artiste
}
?>