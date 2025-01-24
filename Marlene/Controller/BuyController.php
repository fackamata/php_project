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
    

function display_show_buy(int $idobject):array
{
    
    // require_once './Modeles/Goodies.php';
    // $goodie = get_goodies_by_id($idobject);
    // var_dump($goodie);
    

    return [
        // 'buys' => $buys,
        'page' => 'show_buy',
        'title' => "achat ",
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



function display_add_buy_admin(): array
{

    require_once __DIR__."/../Modeles/Clients.php";
    require_once __DIR__."/../Modeles/Goodies.php";
    $clients = get_all_clients();
    $object = get_all_goody();    
    // var_dump($clients);
    return [
        'page' => 'add_buy_admin',
        'title' => "Ajout achat admin",
        'clients' => $clients,
        'plus_js' => true,
        'objects' => $object
    ];  
}

function display_add_buy($idgoodie): array
{
    
    require_once './Modeles/Goodies.php';
    $idclient = $_SESSION["idclient"];
    $goodie = get_goodie_related_artwork_and_artiste($idgoodie);

    return [
        'page' => 'add_buy',
        'title' => "Ajout achat",
        'achat_js' => true,
        'goodie' => $goodie,
        'idclient' => $idclient
    ];  
}

function remove_buy($id):void
{
    // delete_buy($id);
    // index();
    index_buy();
}


function new_buy($idobject):void
{
    // var_dump($_GET);
    $data = $_POST;
    $idclient = $_SESSION['idclient'];
    $data['idobject'] = intval($idobject);
    $data['idclient'] = $idclient;
    
    var_dump($data);
    try {
        add_new_buy($data);
        echo 'achat ajouter';
        
    } catch (\Throwable $th) {
        
        echo "probleme lors de l'enregistrement de l'object acheter : ".$th->getMessage();
    }
    header("location: ".SRV_PATH."Marlene/home.php/?ctrl=client&fct=display_show_client&id=".$idclient );

}

function new_buy_admin():void
{
    $data = $_POST;
    $idobject = $data["idobject"];
    $data['idobject'] = $idobject;
    $data['idclient'] = $data["idclient"];
    
    try {
        add_new_buy($data);
        echo 'achat ajouter';
        
    } catch (\Throwable $th) {
        
        echo "probleme lors de l'enregistrement de l'object acheter : ".$th->getMessage();
    }
    header("location: ".SRV_PATH."Goodies/one_goodies.php/?idobject=".$idobject );

    var_dump($_POST);
    echo "on est dans la fonction new buy";
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


