<?php
// require_once __DIR__."/../Config/Utils.php";
require_once __DIR__."/../Modeles/Clients.php";

echo "Client controlleur included";
/**
 * 
 *                    Client Controlleur
 *  
 *     toutes les fonctions qui gère des données liées :
 *                  - à la table client
 *                  - à la vue client
 *     
 *     en général une fonction :
 *       - insertion de données en base de données:
 *          - traite les données si besoin
 *          - envoie des données avec une fonction du modèle client 
 *          - on peut récupérer un numéro d'id pour une redirection
 *          - si on return quelque chose utiliser un tableau de la forme :
 *                  $data = [ "key" => "value", "k" => "v"];
 *  
 *       - demande d'info à la base de données:
 *          - interroge le modèle client pour récupèrer les données
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
 *      - la liste de tous les clients
 *      - la page à afficher
 *      - le titre de la page
*/
function index_client(): array
{
    $clients = get_all_clients();

    return [
        // 'clients' => $clients,
        'page' => 'index_client',
        'title' => 'Admin Clients',
        'count' => count($clients),
        'clients' => $clients,
    ];
}
    

/**
 * fonction qui retourne $data avec :
 *      - la liste de tous les clients
 *      - la page à afficher
 *      - le titre de la page
*/
function display_show_client(int $id):array
{
    $clients = get_client_by_id($id);

    if (is_file($clients['imageclient'])) {
        $image = $clients['imageclient'];
    }else{
        $image = "no_img.png";
    }

    return [
        // 'clients' => $clients,
        'page' => 'show_client',
        'title' => $clients['pseudoclient'],
        'image' => $image,
        'clients' => $clients,
    ];
}


function display_update_client(int $id): array
{
    $clients = get_client_by_id($id);

    if (is_file($clients['imageclient'])) {
        $image = $clients['imageclient'];
    }else{
        $image = "no_img.png";
    }

    return [
        'page' => 'show_client',
        'title' => "Mise à jour ".$clients['pseudoclient'],
        'image' => $image,
        'clients' => $clients,
    ];
}

/**
 * retourne les données nécessaire pour la page form_passwd_client
 * 
 * @param string $id du client.
 * @return array $data données pour la page form_passwd
*/
function display_form_psswd_client(int $id): array
{
    
    $clients = get_client_by_id($id);
    
    return [
        // 'clients' => $clients,
        'page' => 'form_passwd_client',
        'title' => 'Changement de mot de passe',
        'clients' => $clients,
    ];
}

function update_client(int $id): void
{
    var_dump($id);
    var_dump($_POST);
    // $id = update_client_db($data);
    display_show_client($id);
}

function new_client(): array
{
    return [
        'page' => 'add_client',
        'title' => 'Nouveau client',
    ];        
}

function remove_client($id):void
{
    // delete_client($id);
    // index();
    index_client();
}


/**
 * 
 * 
 * 
 *              FONCTION DE TRAITEMENT
 * 
 *  toutes les fonctions utiles aux traitement des données clients
 * 
 * 
 * 
*/

/**
 *      fonction qui compare un mot de passe en paramètre au mot de passe
 *      client enregistrer en BDD  
 * 
 * 
 * @param string $password mot de passe à comparer.
 * @param string $id id d'un client
 * @return bool Returns `true` si le hash du mot de passe correspond,
 *                      `false` sinon.
*/
function check_old_password_client($passwd, $id): bool{

// c'est le hash du passwd qui est enregistrer en BDD, on doit donc le comparer à un hash
$hash_passwd = password_hash($passwd, PASSWORD_DEFAULT);

if(get_client_passwd($id) == $hash_passwd){
    echo "c'est le même mot de passe";
    $is_same_password = true;
}else{
    $is_same_password = false;
    echo "ce n'est pas le même mot de passe";
}

return $is_same_password;

}


/**
 * fonction qui update le mot de passe d'un client 
 * 
 * 
 * @param string $password The user's password.
 * @param string $hash A hash created by password_hash().
 * @return int $id id du client ou 0
*/

function pwd_change($id): int{
    /* fonction qui update le mot de passe d'un client 

    récupérer l'ancien et le nouveau mot de passe
    check que l'ancien mot de passe soit correct
        si oui : update du mot de passe en BDD
        si non : renvoie sur la page du formulaire
    
    retourne l'identifiant du client modifier
    */

    
    // si on a les données nécessaire, on change le mot de passe
    if(isset($_POST['old_passwd'])
    And $_POST['new_passwd'] !== null )
     {
         $hash_passwd = password_hash($_POST['new_passwd'] , PASSWORD_DEFAULT);
        // on vérifie que l'ancien password est correct
         if(check_old_password_client($hash_passwd, $id))
         {
            // on créé un hash de passwd pour l'enregistrement en BDD
            // on change le mot de passe en BDD
            
            var_dump("le hash du mot de passe est :".$hash_passwd);

            change_password($hash_passwd, $id);
            $msg = "le nouveau mot de passe à bien été enregistrer";
        } else {
            $msg = "l'ancien mot de passe ne correspond pas avec le mot de passe renseigné";
            $id = 0;
        }
    };

    return $id;
}



/**
 * fonction qui update le mot de passe d'un client 
 * 
 * 
 * @param string $password The user's password.
 * @param string $hash A hash created by password_hash().
 * @return bool Returns `true` if the password and hash match, or `false` otherwise.
*/



// function get_view(): array{

    
//     // echo 'dump get :';
//     // var_dump_pre($_GET); 


//     // si on veut différents controlleur on rajoute une variable $ctrl
//     // $ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : "Home" ;
//     // $ctrl = ucfirst($ctrl);
//     // if ($ctrl == "Client") {
//         //     include __DIR__."/Controller/".$ctrl."Controller.php";
//         // }

//     // on récupère la fonction de notre controlleur à exécuter
//     $fonction = isset($_GET['fct']) ? $_GET['fct'] : "index" ; 
    
//     // si on à un id, on le passe dans la fonction
//     if (isset($_GET["id"])) {
//         $id = $_GET["id"];
//         $data = $fonction($id);
//         // $view = "./Views/page/$page.php/?id=$id";
//     } else {
//         $data = $fonction();
//         // var_dump_pre($data);
//     }
    
//     $page = ($data["page"]) ? $data["page"] : 'index' ;

//     $view = is_file("./Views/page/$page.php") ? "./Views/page/$page.php" : "./Views/page/index.php";
    
//     return [
//         'view' => $view,
//         'data' => $data,
//     ];
// }
