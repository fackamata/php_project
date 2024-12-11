<?php
require __DIR__. "/../Modeles/Artistes.php";
/* 
           Artiste Controlleur

   toutes les fonctions liées à la table artiste
   
   en général une fonction :
        - interroge le modèle artiste pour récupèrer les données
        - traite les données si besoin
        - envoie les données à la vue sous la forme d'un tableau
        - ce tableau est toujours au minimum de la forme :
                $data = [
                    "page" => "nom de la page dans app/Vue/page",
                    "title" => "le title de la page",
                ]
            on peut rajouter d'autre données comme
                    "indice" => $id,
                    "variable unique à une page" => $var,


 c'est le controlleur qui interroge le modèle pour
 récupérer des information
*/ 

// echo "controlleur Artiste OK ";

function index($id){
    // echo "fonction index artiste ";
    $artistes = tousLesArtistes();

    return $data = [
        'page' => "indexArtiste", 
        'artistes' => $artistes,
        'title' => 'Artistes',
        'indice' => $id,
    ];
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

