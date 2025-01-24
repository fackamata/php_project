<?php
require_once __DIR__."/../Modeles/Clients.php";

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
    // block_access_admin_marlene();
    $clients = get_all_clients();

    return [
        // 'clients' => $clients,
        'page' => 'index_client',
        'title' => 'Admin Clients',
        'count' => count($clients),
        'clients' => $clients,
    ];
}

// function block_access_admin_marlene(){
//     if(! $_SERVER["PHP_AUTH_USER"]){

//         // header("location : ".SRV_PATH.",  )
//         header("HTTP/1.1 401 Authorization Required"); 
//         echo " error 401";
//     } else if ($_SERVER["PHP_AUTH_USER"] != 'ksjdfl'){
//         // header("HTTP/1.1 403 Forbidden");
//         header("Location:  /index.php",TRUE,403);
//         echo " error 403";
//     }else{

//         echo 'vous êtes autorisé';
//     }
//     ;
// }
    

/**
 * fonction qui retourne $data avec :
 *      - la liste de tous les clients
 *      - la page à afficher
 *      - le titre de la page
*/
function display_show_client(int $id):array
{
    $clients = get_client_by_id($id);
    
    require_once './Modeles/Preferredartistes.php';
    require_once './Modeles/Buys.php';
    $favoritartiste = get_preferredartiste_by_id_client($id);
    $achats = get_all_buys_for_client($id);
    // var_dump($favoritartiste);
    
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
        'achats' => $achats,
        'artiste_preferer' => $favoritartiste,
    ];
}

function display_update_client(int $id): array
{
    $clients = get_client_by_id($id);

    // if(isset($_POST)){ echo "on a les post dans display update_client";}
    if (isset($clients['imageclient'])) {
        $image = $clients['imageclient'];
    }else{
        $image = "no_img.png";
    }

    return [
        'page' => 'update_client',
        'title' => "Mise à jour ".$clients['pseudoclient'],
        'image' => $image,
        'clients' => $clients,
    ];
}

function display_login_client(): array
{
    return [
        'page' => 'form_login_client',
        'title' => "Login client",
        'client_check_passwd_js' => true,
    ];
}

function login_client()
{
    // echo "dans login client";
    if(isset($_POST["pseudoclient"]) && isset($_POST["motdepasseclient"])){

        $passwd_form= $_POST['motdepasseclient'];
        $id = get_client_id($_POST["pseudoclient"]);

        $passwd_db = get_client_passwd( $id );

        // $passwd_db = get_client_passwd_by_pseudo($_POST['pseudoclient']);
        
        $test = password_verify($passwd_form, $passwd_db);

        if ($test) {
            $id = login_client_in_db($_POST["pseudoclient"], $passwd_db);
            // on initialise les données de session
            $client = get_client_by_id($id);
            // var_dump($client);
            $_SESSION['idclient'] = $client['idclient'];
            $_SESSION['pseudoclient'] = $client['pseudoclient'];
            $_SESSION['emailclient'] = $client['emailclient'];
            $_SESSION['prenomclient'] = $client['prenomclient'];
            $_SESSION['nomclient'] = $client['nomclient'];
            $_SESSION['cpclient'] = $client['cpclient'];
            $_SESSION['villeclient'] = $client['villeclient'];
            // TODO finir d'init la session client
            header("location: ".MARLENE_PATH."/home.php/c?ctrl=client&fct=display_show_client&id=".$id);
        }
        else
        {
            $msg ='le mot de passe ne correspond pas';
            header("location: ".MARLENE_PATH."/home.php/?ctrl=client&fct=display_login_client&msg=$msg");
        }
    }
    else{
        // header("location: ".MARLENE_PATH."/home.php/?ctrl=client&fct=display_show_client");
    }
}





function display_add_client(): array
{
    $pseudo = get_all_clients_pseudo();
    $email = get_all_clients_email();
    return [
        'page' => 'add_client',
        'title' => "Ajout client",
        'pseudo' => $pseudo,
        'email' => $email,
        'client_check_passwd_js' => true,
        'client_check_pseudo_js' => true,
    ];
}

/**
 * retourne les données nécessaire pour la page form_passwd_client
 * 
 * @param string $id du client.
 * @return array $data données pour la page form_passwd
*/
function display_form_psswd_client(int $id, string $msg =""): array
{
    // echo " on passe par display_form";
    $clients = get_client_by_id($id);

    if( $msg !== ""){
        echo $msg;
    }
    
    return [
        'page' => 'form_passwd_client',
        'title' => 'Changement de mot de passe',
        'clients' => $clients,
        'client_check_passwd_js' => true,
    ];
}

function update_client(int $id): void
{
    // echo "on est dans la fonction update client";
    // var_dump($_POST);
    // if(isset($_POST[''])) {
    //     echo "le post est bien dans le update";
    // }

    update_client_db($_POST, $id);
    // display_show_client($id);
    header("location:".MARLENE_PATH."home.php/?ctrl=client&fct=display_show_client&id=".$id);
    die;    
}


function new_client(): void
{
    $data = $_POST;
    // var_dump_pre($data);
    // $file = $_FILES;
    // var_dump($file);
    // upload_image();
    // var_dump($data['motdepasseclient']);
    $data['motdepasseclient'] = password_hash($data['motdepasseclient'], PASSWORD_DEFAULT);
    // var_dump($data['motdepasseclient']);
    try {
        $msg = add_new_client($data);
        header("location: ".MARLENE_PATH."home.php/?ctrl=client&fct=display_login_client&msg=".$msg);
        // header("location: ".MARLENE_PATH."home.php/?ctrl=client&fct=display_show_client&id=".$id);
        // display_show_client($id);
        
    } catch (\Throwable $th) {
        
        header("location: ".MARLENE_PATH."home.php/?ctrl=client&fct=display_add_client&msg=".$th->getMessage());
        // return [
        //     'page' => 'home',
        //     'title' => 'Admin client',
        //     'clients' => $data
        // ]; 
    }
           
}

function remove_client($id):void
{
    delete_client($id);
    // index();
    // index_client();
    header("location: ".MARLENE_PATH."/home.php/c?ctrl=client&fct=index_client");

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
 * fonction qui change le mot de passe d'un client 
 * 
 * 
 * @param string $password The user's password.
 * @param string $hash A hash created by password_hash().
 * @return int $id id du client ou 0
*/
function pwd_change($id): void{
    if(isset($_POST['old_passwd']) && $_POST['motdepasseclient'] !== null )
     {
        // $change = false;

        $passwd_form= $_POST['old_passwd'];
        $passwd_db = get_client_passwd($_POST['idclient']);
        
        $test = password_verify($passwd_form, $passwd_db);

        if($test){
            
            try{
                $hash_passwd = password_hash($_POST['motdepasseclient'], PASSWORD_DEFAULT);
                change_password_client($hash_passwd, $id);
                $msg = "le mot de passe à bien été changé ";
                // $change = true;
                // display_show_client($id);
                // header("location: ".MARLENE_PATH."home.php/?ctrl=client&fct=display_show_client&=id=".$id."&msg=".$msg);
            }catch(Exception $e){
                $msg = "". $e->getMessage() ."";
            }
            header("location: ".MARLENE_PATH."home.php/?ctrl=client&fct=display_show_client&id=".$id."&msg=".$msg);
        }else{
            $msg = "FAUX mot de passe";
            header("location: ".MARLENE_PATH."home.php/?ctrl=client&fct=display_form_psswd_client&id=".$id."&msg=".$msg);
        }
    }

    // if($change){
    //     display_show_client($id);
    //     display_show_client($id);
    // }else{
    //     display_form_psswd_client($id);
    // }

}



/**
 * fonction qui update le mot de passe d'un client 
 * 
 * 
 * @param string $password The user's password.
 * @param string $hash A hash created by password_hash().
 * @return bool Returns `true` if the password and hash match, or `false` otherwise.
*/

function upload_image(): void{
    $target_dir = "./../upload/";
    $target_file = $target_dir . basename($_FILES["imageclient"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["imageclient"]["tmp_name"]);
    
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        try {
            move_uploaded_file($target_file, $target_dir);
        } catch (\Throwable $th) {
            echo "problème lors du téléchargement de l'image : ". $th->getMessage() ."";
        }
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
  }
  