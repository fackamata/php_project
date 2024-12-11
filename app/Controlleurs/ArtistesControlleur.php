<?php

// require_once("./../Modeles/Artistes.php");
require __DIR__. "/../Modeles/Artistes.php";
// require __DIR__. "/../Config/Utils.php";
// require_once './../Modeles/Artistes.php';

//require __DIR__. "/app/Modeles/Artistes.php";

function testArt($var="Super !"){
    return "je fonctionne ". $var;

}

function afficheTousLesArtistes(){
    // interroge la base de données avec la fonction app\Modele\Artistes : tousLesArtistes()
    $artistes = tousLesArtistes();
    // var_dump($artistes) ;
    $data =  [
        'artistes' => $artistes,
        'title' => 'Artistes'
    ];
    return $data;
}

function ajoutUnArtiste(){
    // interroge la base de données avec la fonction app\Modele\Artistes : tousLesArtistes()
    $id_art = addArtistes();    
    // var_dump($artistes) ;
    return $id_art;
}

