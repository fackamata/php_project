<?php
require_once __DIR__."/../Modeles/Bids.php";

/**
 * 
 *                    Bid Controlleur
 *  
 *     toutes les fonctions qui gère des données liées :
 *                  - à la table Echere
 *                  - à la vue Echere
 *     
 *     en général une fonction :
 *       - insertion de données en base de données:
 *          - traite les données si besoin
 *          - envoie des données avec une fonction du modèle Echere 
 *          - on peut récupérer un numéro d'id pour une redirection
 *          - si on return quelque chose utiliser un tableau de la forme :
 *                  $data = [ "key" => "value", "k" => "v"];
 *  
 *       - demande d'info à la base de données:
 *          - interroge le modèle Echere pour récupèrer les données
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



function index_bid(): array
{
    $bids = get_all_bids();

    return [
        // 'bids' => $bids,
        'page' => 'index_bid',
        'title' => 'Admin bids',
        'count' => count($bids),
        'bids' => $bids,
    ];
}
    

function display_show_bid(int $id):array
{
    $bids = get_bid_by_id($id);

    if (is_file($bids['imagebid'])) {
        $image = $bids['imagebid'];
    }else{
        $image = "no_img.png";
    }

    return [
        // 'bids' => $bids,
        'page' => 'show_bid',
        'title' => $bids['pseudobid'],
        'image' => $image,
        'bids' => $bids,
    ];
}


function display_add_bid(): array
{
    include "./../../fonctionsBDD";

    $artworks = get_all_artwork();
    $clients = get_all_clients();
    // $client= get_client_by_id($id);
    return [
        'page' => 'add_bid',
        'artworks' => $artworks,
        'clients' => $clients,
        'title' => "Ajout bid",
    ];
}

function display_update_bid(int $id): array
{
    $bids = get_bid_by_id($id);

    if (is_file($bids['imagebid'])) {
        $image = $bids['imagebid'];
    }else{
        $image = "no_img.png";
    }

    return [
        'page' => 'show_bid',
        'title' => "Mise à jour ".$bids['pseudobid'],
        'image' => $image,
        'bids' => $bids,
    ];
}


function update_bid(int $id): void
{
    var_dump($id);
    var_dump($_POST);
    // $id = update_bid_db($data);
    display_show_bid($id);
}

function new_bid(): array
{
    return [
        'page' => 'add_bid',
        'title' => 'Nouveau bid',
    ];        
}

function remove_bid($id):void
{
    // delete_bid($id);
    // index();
    index_bid();
}


/**
 * 
 * 
 * 
 *              FONCTION DE TRAITEMENT
 * 
 *  toutes les fonctions utiles aux traitement des données bids
 * 
 * 
 * 
*/


