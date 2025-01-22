<?php
require_once __DIR__."/../Modeles/Buys.php";

/**
 * 
 *                    buy Controlleur
 *  
 *     toutes les fonctions qui gère des données liées :
 *                  - à la table Acheter
 *                  - à la vue Acheter
 *     
 *     en général une fonction :
 *       - insertion de données en base de données:
 *          - traite les données si besoin
 *          - envoie des données avec une fonction du modèle Acheter 
 *          - on peut récupérer un numéro d'id pour une redirection
 *          - si on return quelque chose utiliser un tableau de la forme :
 *                  $data = [ "key" => "value", "k" => "v"];
 *  
 *       - demande d'info à la base de données:
 *          - interroge le modèle Acheter pour récupèrer les données
 *          - traite les données si besoin
 *          - envoie les données à la vue sous la forme d'un tableau
 *          - ce tableau est toujours au minimum de la forme :
 *                  $data = [
 *                      "page" => "nom de la page dans app/Vue/page",
 *                      "title" => "le title de la page",
 *                  ]
 *              on peut rajouter d'autre données comme
 *                      "indice" => $id,
 *                      "variable unique à une page" => $var,
 *  
 *  
 *   c'est le controlleur qui interroge le modèle pour
 *   récupérer des information et les envoyer à la page home.php
 *
*/

/**
 * 
 * 
 * 
 *              FONCTION D'AFFICHAGE
 * 
 *  toutes les fonctions qui envoie des données aux vues
 * 
 * 
 * 
*/



function index_buy(): array
{
    $buys = get_all_buys();

    return [
        // 'buys' => $buys,
        'page' => 'index_buy',
        'title' => 'Admin buys',
        'count' => count($buys),
        'buys' => $buys,
    ];
}
    

function display_show_buy(int $id):array
{
    $buys = get_buy_by_id($id);

    if (is_file($buys['imagebuy'])) {
        $image = $buys['imagebuy'];
    }else{
        $image = "no_img.png";
    }

    return [
        // 'buys' => $buys,
        'page' => 'show_buy',
        'title' => $buys['pseudobuy'],
        'image' => $image,
        'buys' => $buys,
    ];
}


function display_update_buy(int $id): array
{
    $buys = get_buy_by_id($id);

    if (is_file($buys['imagebuy'])) {
        $image = $buys['imagebuy'];
    }else{
        $image = "no_img.png";
    }

    return [
        'page' => 'show_buy',
        'title' => "Mise à jour ".$buys['pseudobuy'],
        'image' => $image,
        'buys' => $buys,
    ];
}


function update_buy(int $id): void
{
    var_dump($id);
    var_dump($_POST);
    // $id = update_buy_db($data);
    display_show_buy($id);
}


function display_add_buy(): array
{
    $pseudo = get_all_clients_pseudo();
    $email = get_all_clients_email();
    return [
        'page' => 'add_achat',
        'title' => "Ajout achat",
        'pseudo' => $pseudo,
        'email' => $email,
        'client_check_js' => true,
    ];
}

function remove_buy($id):void
{
    // delete_buy($id);
    // index();
    index_buy();
}


/**
 * 
 * 
 * 
 *              FONCTION DE TRAITEMENT
 * 
 *  toutes les fonctions utiles aux traitement des données buys
 * 
 * 
 * 
*/


