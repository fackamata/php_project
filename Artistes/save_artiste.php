<?php
require './../config.php';  //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Artistes.php';  //Import du fichier contenant les fonctions BDD associé aux Artistes
require_once BASE_PATH.'/fonctionsBDD/Exposer.php';  //Import du fichier contenant les fonctions BDD associé aux Exposition dans les galeries

echo "<pre>";
print_r($_POST);
echo "</pre>";

preg_match("@(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[\W]).{8,}@", $_POST['firstpass'], $resultat);
if(!$resultat){
    header('Location: ./add_artiste.php?regex=error');
}
else{
    //Initialisation des variables de la fonction BDD avec pg_escape_string pour clean l'entrée string
    $galeryartiste = pg_escape_string($_POST["galeryartiste"]);

    $nomartiste = pg_escape_string($_POST["nomartiste"]);
    $prenomartiste = pg_escape_string($_POST["prenomartiste"]);
    $villeartiste = pg_escape_string($_POST["villeartiste"]);
    $paysartiste = pg_escape_string($_POST["paysartiste"]);
    $emailartiste = pg_escape_string($_POST["emailartiste"]);
    $descriptionartiste = pg_escape_string($_POST["descriptionartiste"]);
    $passwordartiste = password_hash($_POST["firstpass"], PASSWORD_DEFAULT);
    $pseudoartiste = pg_escape_string($_POST["pseudoartiste"]);

    add_artiste($nomartiste, $prenomartiste, $villeartiste, $paysartiste, $emailartiste, $descriptionartiste, $passwordartiste, $pseudoartiste); //Appel de la fonction d'ajout d'un artiste
    $res = login_artiste($pseudoartiste); //Fonction de login de l'artiste

    add_galery_artiste($galeryartiste, $res['idartiste']);

    session_start(); //Démarrage de la session
    $_SESSION['pseudoartiste'] = $res['pseudoartiste']; //Initialisation de la variable de pseudo artiste en session
    $_SESSION['idartiste'] = $res['idartiste']; //Initialisation de la variable d'id d'artiste en session

    header('Location: ./artiste_account.php'); //Redirection sur la page de compte artiste après connexion
}
?>