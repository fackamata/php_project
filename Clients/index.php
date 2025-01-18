<?php
// require_once "../../Utils.php";

// var_dump_pre($_SERVER['REQUEST_URI']);
// var_dump_pre($_GET);

// on récupère le controlleur demander dans l'uri sinon Home
$c = isset($_GET['c']) ? $_GET['c'] : "Home" ;
$c = ucfirst(strtolower($c)); // en minuscule et en Majuscule la 1ère lettre
$controlleur = is_file("./app/Controlleurs/$c.php") ? "./app/Controlleurs/$c.php" : "./app/Controlleurs/HomeControlleur.php";

// on include le controlleur pour utiliser les fonctions de celui-ci
include $controlleur;

// on récupère la fonction du controlleur à exécuter
// du coup il nous faut une fonction dans chaque controlleur
$fonction = isset($_GET['f']) ? $_GET['f'] : "index" ; 

// on récupère l'id si besoin
$indice = isset($_GET['i']) ? $_GET['i'] : 0 ; 

var_dump_pre($controlleur);
// on appel notre fonction et on lui passe l'indice si besoin 
// TODO : voir si obliger un chiffre pour toute les foncitons pour éviter les erreurs
// ou peut être avec un try retry catch ??
// use function 
// $data = index();
try {
    $data = $fonction();
    $page = $data['page'];
    //code...
} catch (\Throwable $th) {
    throw $th;
    $view = "./index.php";
}

// $p = 'home';
$view = is_file("./$page.php") ? "./$page.php" : "./index.php";

ob_start(); // démarre la temporisation de sortie
extract($data);
require_once $view;
$view_content = ob_get_clean(); // fait le get content et le nettoie la mémoire tampon


