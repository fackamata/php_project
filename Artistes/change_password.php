<?php
require './../config.php';  //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH."/fonctionsBDD/Artistes.php"; //Import du fichier contenant les fonctions BDD associé aux Artistes

session_start(); //Lance la session

preg_match("@(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[\W]).{8,}@", $_POST['firstpass'], $resultat); //Expression Regex vérification du mot de passe
if(!$resultat){ //Condition de vérification regex
    header('Location: ./edit_artiste.php?regex=error');
}
else{
    $res = login_artiste($_SESSION['pseudoartiste']); //Appel la fonction login de l'artiste pour récupérer le mot de passe

    $test = password_verify($_POST['oldpass'], $res['motdepasseartiste']); //Vérifie la similitude des mot de passe?
    if ($test){
        change_password(password_hash($_POST['firstpass'], PASSWORD_DEFAULT), $_SESSION['idartiste']); //Fonction de changement de mot de passe par le nouveau, hasher avec password_hash
        header('Location: ./artiste_account.php'); //Redirection sur la page du compte
    }
}
?>