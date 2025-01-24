<?php
require "./../config.php"; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Artistes.php'; //Import du fichier contenant les fonctions BDD associé aux Artistes
require_once BASE_PATH.'/fonctionsBDD/Exposer.php';  //Import du fichier contenant les fonctions BDD associé aux Exposition dans les galeries

session_start();

preg_match("#[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}#", $_POST['email'], $resultatmail); //Expression Regex vérification de l'adresse mail
echo "<pre>";
print_r($resultatmail);
echo "</pre>";
if(!$resultatmail){ //Condition de vérification regex
    header('Location: ./edit_artiste.php?regexmail=error');
}
else{
    //Initialisation des variables nettoyé avec pg_escape_string pour la fonction edit_artiste
    $nomartiste = pg_escape_string($_POST['nom']);
    $descriptionartiste = pg_escape_string($_POST['description']);
    $prenomartiste = pg_escape_string($_POST["prenom"]);
    $villeartiste = pg_escape_string($_POST["ville"]);
    $paysartiste = pg_escape_string($_POST["pays"]);
    $emailartiste = pg_escape_string($_POST["email"]);
    $pseudoartiste = pg_escape_string($_POST["pseudo"]);

    $galeryartiste = pg_escape_string($_POST['galeryartiste']);
    edit_galery_artiste($galeryartiste, $_SESSION['idartiste']);

    if (!(move_uploaded_file($_FILES['image']['tmp_name'], "../upload/".$_FILES['image']['name']))){ //Test d'upload d'un fichier image, nul si error
        $_FILES["image"]["name"] = '';
    }
    $imageartiste =$_FILES["image"]["name"];

    edit_artiste($nomartiste, $descriptionartiste, $prenomartiste, $villeartiste, $paysartiste, $emailartiste, $pseudoartiste, $imageartiste, $_SESSION['idartiste']); //Appel à la fonction de modification d'un artiste
    $_SESSION['pseudoartiste'] = $pseudoartiste; //Update de la variable de session pseudo si modifié
    header('Location: ./artiste_account.php'); //Redirection sur la page de compte de l'artiste
}
?>