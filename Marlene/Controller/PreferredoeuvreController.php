<?php
require_once __DIR__."/../Modeles/Prefereroeuvre.php";

/**
 * 
 *                    preferredoeuvre Controlleur
 *  
 *     toutes les fonctions qui gère des données liées :
 *                  - à la table preferredoeuvre
 *                  - à la vue preferredoeuvre
 *     
 *     en général une fonction :
 *       - insertion de données en base de données:
 *          - traite les données si besoin
 *          - envoie des données avec une fonction du modèle preferredoeuvre 
 *          - on peut récupérer un numéro d'id pour une redirection
 *          - si on return quelque chose utiliser un tableau de la forme :
 *                  $data = [ "key" => "value", "k" => "v"];
 *  
 *       - demande d'info à la base de données:
 *          - interroge le modèle preferredoeuvre pour récupèrer les données
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
 *      - la liste de tous les preferredoeuvres
 *      - la page à afficher
 *      - le titre de la page
*/
function index_preferredoeuvre(): array
{
    $preferredoeuvres = get_all_preferredoeuvre();

    return [
        // 'preferredoeuvres' => $preferredoeuvres,
        'page' => 'index_preferredoeuvre',
        'title' => 'Admin preferredoeuvres',
        'preferredoeuvres' => $preferredoeuvres,
    ];
}
    

/**
 * fonction qui retourne $data avec :
 *      - la liste de tous les preferredoeuvres
 *      - la page à afficher
 *      - le titre de la page
*/
function display_show_preferredoeuvre(int $id):array
{
    $preferredoeuvres = get_preferredoeuvre_by_id($id);
    // session_start();
    // if(isset($_SESSION)){
    //     var_dump($_SESSION);
    // }else{
    //     echo 'pas de session';
    // }
    
    if (is_file($preferredoeuvres['imagepreferredoeuvre'])) {
        $image = $preferredoeuvres['imagepreferredoeuvre'];
    }else{
        $image = "no_img.png";
    }

    return [
        // 'preferredoeuvres' => $preferredoeuvres,
        'page' => 'show_preferredoeuvre',
        'title' => $preferredoeuvres['pseudopreferredoeuvre'],
        'image' => $image,
        'preferredoeuvres' => $preferredoeuvres,
    ];
}

function display_update_preferredoeuvre(int $id): array
{
    $preferredoeuvres = get_preferredoeuvre_by_id($id);

    if(isset($_POST)){ echo "on a les post dans display update_preferredoeuvre";}
    if (isset($preferredoeuvres['imagepreferredoeuvre'])) {
        $image = $preferredoeuvres['imagepreferredoeuvre'];
    }else{
        $image = "no_img.png";
    }

    return [
        'page' => 'update_preferredoeuvre',
        'title' => "Mise à jour ".$preferredoeuvres['pseudopreferredoeuvre'],
        'image' => $image,
        'preferredoeuvres' => $preferredoeuvres,
    ];
}

function display_login_preferredoeuvre(): array
{
    return [
        'page' => 'form_login_preferredoeuvre',
        'title' => "Login preferredoeuvre",
    ];
}

function login_preferredoeuvre()
{
    // echo "dans login preferredoeuvre";
    if(isset($_POST["pseudopreferredoeuvre"]) && isset($_POST["motdepassepreferredoeuvre"])){

        $passwd_form= $_POST['motdepassepreferredoeuvre'];
        $id = get_preferredoeuvre_id($_POST["pseudopreferredoeuvre"]);

        $passwd_db = get_preferredoeuvre_passwd( $id );

        // $passwd_db = get_preferredoeuvre_passwd_by_pseudo($_POST['pseudopreferredoeuvre']);
        
        $test = password_verify($passwd_form, $passwd_db);

        if ($test) {
            $id = login_preferredoeuvre_in_db($_POST["pseudopreferredoeuvre"], $passwd_db);
            // on initialise les données de session
            $preferredoeuvre = get_preferredoeuvre_by_id($id);
            var_dump_pre($preferredoeuvre);
            $_SESSION['idpreferredoeuvre'] = $preferredoeuvre['idpreferredoeuvre'];
            $_SESSION['pseudopreferredoeuvre'] = $preferredoeuvre['pseudopreferredoeuvre'];
            $_SESSION['emailpreferredoeuvre'] = $preferredoeuvre['emailpreferredoeuvre'];
            $_SESSION['prenompreferredoeuvre'] = $preferredoeuvre['prenompreferredoeuvre'];
            $_SESSION['nompreferredoeuvre'] = $preferredoeuvre['nompreferredoeuvre'];
            $_SESSION['cppreferredoeuvre'] = $preferredoeuvre['cppreferredoeuvre'];
            $_SESSION['villepreferredoeuvre'] = $preferredoeuvre['villepreferredoeuvre'];
            // TODO finir d'init la session preferredoeuvre
            header("location: ".MARLENE_PATH."/home.php/c?ctrl=preferredoeuvre&fct=display_show_preferredoeuvre&id=".$id);
        }
        else
        {
            $msg ='le mot de passe ne correspond pas';
            header("location: ".MARLENE_PATH."/home.php/?ctrl=preferredoeuvre&fct=display_login_preferredoeuvre&msg=$msg");
        }
    }
    else{
        // header("location: ".MARLENE_PATH."/home.php/?ctrl=preferredoeuvre&fct=display_login_preferredoeuvre");
    }
}


function display_add_preferredoeuvre(): array
{
    return [
        'page' => 'add_preferredoeuvre',
        'title' => "Ajout preferredoeuvre",
    ];
}

/**
 * retourne les données nécessaire pour la page form_passwd_preferredoeuvre
 * 
 * @param string $id du preferredoeuvre.
 * @return array $data données pour la page form_passwd
*/
function display_form_psswd_preferredoeuvre(int $id, string $msg =""): array
{
    // echo " on passe par display_form";
    $preferredoeuvres = get_preferredoeuvre_by_id($id);

    if( $msg !== ""){
        echo $msg;
    }
    
    return [
        'page' => 'form_passwd_preferredoeuvre',
        'title' => 'Changement de mot de passe',
        'preferredoeuvres' => $preferredoeuvres,
    ];
}

function update_preferredoeuvre(int $id): void
{
    // echo "on est dans la fonction update preferredoeuvre";
    // var_dump($_POST);
    if(isset($_POST[''])) {
        echo "le post est bien dans le update";
    }
        update_preferredoeuvre_db($_POST, $id);
    // display_show_preferredoeuvre($id);
    header("location:".MARLENE_PATH."home.php/?ctrl=preferredoeuvre&fct=display_show_preferredoeuvre&id=".$id);
    die;    
}


function new_preferredoeuvre(): void
{
    $data = $_POST;
    // var_dump_pre($data);
    // $file = $_FILES;
    // upload_image();
    // var_dump($file);
    // var_dump($data['motdepassepreferredoeuvre']);
    $data['motdepassepreferredoeuvre'] = password_hash($data['motdepassepreferredoeuvre'], PASSWORD_DEFAULT);
    // var_dump($data['motdepassepreferredoeuvre']);
    try {
        $id = add_new_preferredoeuvre($data);
        header("location: ".MARLENE_PATH."home.php/?ctrl=preferredoeuvre&fct=display_show_preferredoeuvre&id=".$id);
        // display_show_preferredoeuvre($id);
        
    } catch (\Throwable $th) {
        
        header("location: ".SRV_PATH);
        // return [
        //     'page' => 'home',
        //     'title' => 'Admin preferredoeuvre',
        //     'preferredoeuvres' => $data
        // ]; 
    }
           
}

function remove_preferredoeuvre($id):void
{
    // delete_preferredoeuvre($id);
    // index();
    index_preferredoeuvre();
}


/**
 * 
 * 
 * 
 *              FONCTION DE TRAITEMENT
 * 
 *  toutes les fonctions utiles aux traitement des données preferredoeuvres
 * 
 * 
 * 
*/

// /**
//  *      fonction qui compare un mot de passe en paramètre au mot de passe
//  *      preferredoeuvre enregistrer en BDD  
//  * 
//  * 
//  * @param string $password mot de passe à comparer.
//  * @param int $id id d'un preferredoeuvre
//  * @return bool Returns `true` si le hash du mot de passe correspond,
//  *                      `false` sinon.
// */
// function check_password_preferredoeuvre(string $passwd,int $id): bool{
//     // $passwd est un hash car c'est un hash qui est enregistrer en BDD
// if(get_preferredoeuvre_passwd($id) == $passwd){
//     echo "c'est le même mot de passe";
//     $is_same_password = true;
// }else{
//     $is_same_password = false;
//     echo "ce n'est pas le même mot de passe";
// }

// return $is_same_password;

// }


/**
 * fonction qui update le mot de passe d'un preferredoeuvre 
 * 
 * 
 * @param string $password The user's password.
 * @param string $hash A hash created by password_hash().
 * @return int $id id du preferredoeuvre ou 0
*/

function pwd_change($id): void{
    /* fonction qui update le mot de passe d'un preferredoeuvre 

    récupérer l'ancien et le nouveau mot de passe
    check que l'ancien mot de passe soit correct
        si oui : update du mot de passe en BDD
        si non : renvoie sur la page du formulaire
    
    retourne l'identifiant du preferredoeuvre modifier
    */
    echo 'on eest dans passwod change';
    var_dump_pre($_POST);
    // si on a les données nécessaire, on change le mot de passe
    if(isset($_POST['old_passwd']) && $_POST['motdepassepreferredoeuvre'] !== null )
     {
        $change = False;

        $passwd_form= $_POST['old_passwd'];
        $passwd_db = get_preferredoeuvre_passwd($_POST['idpreferredoeuvre']);
        
        $test = password_verify($passwd_form, $passwd_db);

        if($test){
            echo "c'est le bon mot de passe";
            
            try{
                $hash_passwd = password_hash($_POST['motdepassepreferredoeuvre'], PASSWORD_DEFAULT);
                change_password_preferredoeuvre($hash_passwd, $id);
                $change = True;
            }catch(Exception $e){
                echo "". $e->getMessage() ."";
            }
        }else{
            echo "FAUX mot de passe";
        }
    }
    if($change){
        display_show_preferredoeuvre($id);
    }else{
        display_form_psswd_preferredoeuvre($id);
    }

        
    // return [
    //     'page' => 'form_passwd_preferredoeuvre',
    //     'title' => 'Changement de mot de passe',
    //     'preferredoeuvres' => $preferredoeuvres,
    // ];


}



/**
 * fonction qui update le mot de passe d'un preferredoeuvre 
 * 
 * 
 * @param string $password The user's password.
 * @param string $hash A hash created by password_hash().
 * @return bool Returns `true` if the password and hash match, or `false` otherwise.
*/
