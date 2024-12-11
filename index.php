<?php
require_once "app/Config/Utils.php"; // pour faire des beau var dump

// var_dump_pre($_SERVER['REQUEST_URI']);
var_dump_pre($_GET);

// on récupère le controlleur demander dans l'uri sinon Home
$c = isset($_GET['c']) ? $_GET['c'] : "HomeControlleur" ;
// en minuscule 
$c = strtolower($c); 
// la 1ère lettre en Majuscule
$c = ucfirst($c); 
// et on ajoute Controlleur
$c = $c."Controlleur";
// var_dump_pre($c);
$controlleur = is_file("./app/Controlleurs/$c.php") ? "./app/Controlleurs/$c.php" : "./app/Controlleurs/HomeControlleur.php";
var_dump_pre($controlleur);

// on include le controlleur pour utiliser les fonctions de celui-ci
require_once $controlleur;

// on récupère la fonction du controlleur à exécuter
// du coup il nous faut une fonction dans chaque controlleur
$fonction = isset($_GET['f']) ? $_GET['f'] : "index" ; 

// on récupère l'id si besoin
$indice = isset($_GET['i']) ? $_GET['i'] : 0 ; 

//code...
try {
    $data = $fonction($id);
    // var_dump_pre($data);
    $page = $data['page'];
    $title = $data['title'];

} catch (\Throwable $th) {
    throw $th;
    $page = "404";
    $title = "perdu !";
}

// on récupère la vue
$view = is_file("./app/Vues/page/$page.php") ? "./app/Vues/page/$page.php" : "./app/Vues/page/404.php";

ob_start(); // démarre la temporisation de sortie
extract($data); // extraie les données qu'on utilise dans la vue
require_once $view;
$view_content = ob_get_clean(); // fait le get content et le nettoie la mémoire tampon

require_once "./app/Vues/templates/default.php";
// die();
