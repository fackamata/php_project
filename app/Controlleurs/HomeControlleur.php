<?php
/* 
           Home Controlleur

   
    toutes les fonctions qui envoie des données à des vues
    qui ne sont pas liées à des modèles de données


    a minima une fonction retourne le tableau basic pour la vue :
        $data = [
            "page" => "nom de la page dans app/Vue/page",
            "title" => "le title de la page",
        ]
*/ 


/**
 * fonction qui retourne la page home
 */
function index($id){
    // TODO remove after test
    echo ' index reçu :'.$id;
    // var_dump($id);

    return $data = [
        'page' => "home",
        'title' => 'Home',
        'indice' => $id,
    ];
}


/**
 * fonction qui retourne la page 404
 */
function notFound404(){
    // print('fonction 404') ;
    return $data = [
        'page' => "404", 
        'title' => '404'
    ];
}
