<?php
require_once __DIR__."/../Modeles/Preferredartistes.php";

/**
 * 
 *                    preferredartiste Controlleur
 *  
 *     toutes les fonctions qui gère des données liées :
 *                  - à la table preferredartiste
 *                  - à la vue preferredartiste
 *     
 *     en général une fonction :
 *       - insertion de données en base de données:
 *          - traite les données si besoin
 *          - envoie des données avec une fonction du modèle preferredartiste 
 *          - on peut récupérer un numéro d'id pour une redirection
 *          - si on return quelque chose utiliser un tableau de la forme :
 *                  $data = [ "key" => "value", "k" => "v"];
 *  
 *       - demande d'info à la base de données:
 *          - interroge le modèle preferredartiste pour récupèrer les données
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



/**
 * fonction qui retourne $data avec :
 *      - la liste de tous les preferredartistes
 *      - la page à afficher
 *      - le titre de la page
*/
function index_preferredartiste(): array
{
    $preferredartistes = get_all_preferredartiste();

    return [
        // 'preferredartistes' => $preferredartistes,
        'page' => 'index_preferredartiste',
        'title' => 'Admin preferredartistes',
        'preferredartistes' => $preferredartistes,
    ];
}
    

/**
 * fonction qui retourne $data avec :
 *      - la liste de tous les preferredartistes
 *      - la page à afficher
 *      - le titre de la page
*/
function display_show_preferredartiste(int $id):array
{
    $preferredartistes = get_preferredartiste_by_id($id);
    // session_start();
    // if(isset($_SESSION)){
    //     var_dump($_SESSION);
    // }else{
    //     echo 'pas de session';
    // }
    
    if (is_file($preferredartistes['imagepreferredartiste'])) {
        $image = $preferredartistes['imagepreferredartiste'];
    }else{
        $image = "no_img.png";
    }

    return [
        // 'preferredartistes' => $preferredartistes,
        'page' => 'show_preferredartiste',
        'title' => $preferredartistes['pseudopreferredartiste'],
        'image' => $image,
        'preferredartistes' => $preferredartistes,
    ];
}

function display_update_preferredartiste(int $id): array
{
    $preferredartistes = get_preferredartiste_by_id($id);

    if(isset($_POST)){ echo "on a les post dans display update_preferredartiste";}
    if (isset($preferredartistes['imagepreferredartiste'])) {
        $image = $preferredartistes['imagepreferredartiste'];
    }else{
        $image = "no_img.png";
    }

    return [
        'page' => 'update_preferredartiste',
        'title' => "Mise à jour ".$preferredartistes['pseudopreferredartiste'],
        'image' => $image,
        'preferredartistes' => $preferredartistes,
    ];
}

function display_add_preferredartiste(): array
{
    require_once __DIR__."/../Modeles/Clients.php";
    require_once __DIR__."/../Modeles/Artistes.php";
    // require_once "./../fonctionsBDD/Artistes.php";

    $clients = get_all_clients();
    $artistes = get_all_artistes();

    return [
        'page' => 'add_preferredartiste',
        'title' => "Ajout preferredartiste",
        'clients' => $clients,
        'artistes' => $artistes,
    ];
}


function update_preferredartiste(int $id): void
{
    // echo "on est dans la fonction update preferredartiste";
    // var_dump($_POST);
    if(isset($_POST[''])) {
        echo "le post est bien dans le update";
    }
        update_preferredartiste_db($_POST, $id);
    // display_show_preferredartiste($id);
    header("location:".MARLENE_PATH."home.php/?ctrl=preferredartiste&fct=display_show_preferredartiste&id=".$id);
    die;    
}


function new_preferredartiste(): void
{
    $data = $_POST;
    $idartiste = $data["idartiste"];
    var_dump_pre($data);
    // $file = $_FILES;
    // upload_image();
    try {
        add_new_preferredartiste($data);
        echo 'préférences ajouter';
        
    } catch (\Throwable $th) {
        
        echo "probleme lors de l'enregistrement de l'artiste préféré : ".$th->getMessage();
    }
    header("location: ".SRV_PATH."Artistes/show_artiste.php/?idartiste=".$idartiste );
           
}


// function display_artiste()
// {

// }


// function remove_preferredartiste($idartiste):void
// {
//     $idclient = 

//     // delete_preferredartiste($id);
//     // index();
//     index_preferredartiste();
//     header("location: ".MARLENE_PATH."/home.php/c?ctrl=preferredartiste&fct=index_preferredartiste");
// }



