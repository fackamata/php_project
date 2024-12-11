<?php

// le controlleur sert à envoyer du contenu aux vues
// S'il as besoin de données en BDD, il appel les fonctions dans les modèles 

echo "home controlleur OK ";



function index($id){
    echo 'fonction index '.$id;
    return $data = [
        'page' => "home",
        'title' => 'Home',
        'indice' => $id,
    ];
}

function notFound404(){
    print('fonction 404') ;
    return $data = [
        'page' => "404", 
        'title' => '404'
    ];
}

 