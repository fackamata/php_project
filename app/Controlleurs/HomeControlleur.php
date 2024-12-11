<?php

// le controlleur sert à envoyer du contenu aux vues
// S'il as besoin de données en BDD, il appel les fonctions dans les modèles 

echo "le home controlleur fonctionne ";



function index(){
    echo 'fonction index dans le controlleur home';
    return $data = [
        'page' => "home", 
    ];
}

 