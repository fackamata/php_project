<?php
require_once "app/Config/Utils.php"; // pour faire de beau var dump <pre>
/* 
           index.php

   page par laquelle passe tous l'affichage de notre site web

   pour que les vues soient chargées dynamiquement:
    - on utilise les variables :
        c pour controlleur
        f pour fonction
        i pour indice
    - dans l'uri sous la forme :
        notreSite/?c=nomControlleur&f=nomFonction&i=numéroIndice
    - récupérable avec la variable spéciales $_GET ( $_GET['i'])
    - on require le controller
    - on appelle la fonctionle controller


*/ 

// var_dump_pre($_GET);

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
// var_dump_pre($controlleur);

// on include le controlleur pour utiliser les fonctions de celui-ci
require_once $controlleur;

// on récupère la fonction du controlleur à exécuter
// du coup il nous faut une fonction index dans chaque controlleur
// la page d'acceuil du controlleur en gros
$fonction = isset($_GET['f']) ? $_GET['f'] : "index" ; 

// on récupère l'id si besoin
$id = isset($_GET['i']) ? $_GET['i'] : 0 ; 
// var_dump_pre($id);

switch ($fonction) {
    case 'index':
        $data = $fonction($id);
        break;
    case 'update':
        $data = $fonction($id, $_POST); // TODO voir quel param entrer
        break;
}



// on sait jamais...
try {
    // remplacer par le switch plus haut
                // On appel la fonction demander avec comme paramètre l'id
                // $data = $fonction($id);
    // var_dump_pre($data);
    $page = $data['page'];
    $title = $data['title'];

} catch (\Throwable $th) {
    throw $th;
    $page = "404";
    $title = "perdu !";
}

// // test des images en cours
// $img = __DIR__."assets/img/default_sm.png";
// // var_dump_pre($img);
// $img_alt = "alternative à l'image";


// on récupère la vue
$view = is_file("./app/Vues/page/$page.php") ? "./app/Vues/page/$page.php" : "./app/Vues/page/404.php";

ob_start(); // démarre la temporisation de sortie
extract($data); // extraie les données qu'on utilise dans la vue
require_once $view;
$view_content = ob_get_clean(); // fait le get content et le nettoie la mémoire tampon

require_once "./app/Vues/templates/default.php";
// die();
