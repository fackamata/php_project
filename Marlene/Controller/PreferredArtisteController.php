<?php
require_once __DIR__."/../Modeles/prefererartiste.php";

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

function display_login_preferredartiste(): array
{
    return [
        'page' => 'form_login_preferredartiste',
        'title' => "Login preferredartiste",
    ];
}

function login_preferredartiste()
{
    // echo "dans login preferredartiste";
    if(isset($_POST["pseudopreferredartiste"]) && isset($_POST["motdepassepreferredartiste"])){

        $passwd_form= $_POST['motdepassepreferredartiste'];
        $id = get_preferredartiste_id($_POST["pseudopreferredartiste"]);

        $passwd_db = get_preferredartiste_passwd( $id );

        // $passwd_db = get_preferredartiste_passwd_by_pseudo($_POST['pseudopreferredartiste']);
        
        $test = password_verify($passwd_form, $passwd_db);

        if ($test) {
            $id = login_preferredartiste_in_db($_POST["pseudopreferredartiste"], $passwd_db);
            // on initialise les données de session
            $preferredartiste = get_preferredartiste_by_id($id);
            var_dump_pre($preferredartiste);
            $_SESSION['idpreferredartiste'] = $preferredartiste['idpreferredartiste'];
            $_SESSION['pseudopreferredartiste'] = $preferredartiste['pseudopreferredartiste'];
            $_SESSION['emailpreferredartiste'] = $preferredartiste['emailpreferredartiste'];
            $_SESSION['prenompreferredartiste'] = $preferredartiste['prenompreferredartiste'];
            $_SESSION['nompreferredartiste'] = $preferredartiste['nompreferredartiste'];
            $_SESSION['cppreferredartiste'] = $preferredartiste['cppreferredartiste'];
            $_SESSION['villepreferredartiste'] = $preferredartiste['villepreferredartiste'];
            // TODO finir d'init la session preferredartiste
            header("location: ".MARLENE_PATH."/home.php/c?ctrl=preferredartiste&fct=display_show_preferredartiste&id=".$id);
        }
        else
        {
            $msg ='le mot de passe ne correspond pas';
            header("location: ".MARLENE_PATH."/home.php/?ctrl=preferredartiste&fct=display_login_preferredartiste&msg=$msg");
        }
    }
    else{
        // header("location: ".MARLENE_PATH."/home.php/?ctrl=preferredartiste&fct=display_login_preferredartiste");
    }
}


function display_add_preferredartiste(): array
{
    return [
        'page' => 'add_preferredartiste',
        'title' => "Ajout preferredartiste",
    ];
}

/**
 * retourne les données nécessaire pour la page form_passwd_preferredartiste
 * 
 * @param string $id du preferredartiste.
 * @return array $data données pour la page form_passwd
*/
function display_form_psswd_preferredartiste(int $id, string $msg =""): array
{
    // echo " on passe par display_form";
    $preferredartistes = get_preferredartiste_by_id($id);

    if( $msg !== ""){
        echo $msg;
    }
    
    return [
        'page' => 'form_passwd_preferredartiste',
        'title' => 'Changement de mot de passe',
        'preferredartistes' => $preferredartistes,
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
    // var_dump_pre($data);
    // $file = $_FILES;
    // upload_image();
    // var_dump($file);
    // var_dump($data['motdepassepreferredartiste']);
    $data['motdepassepreferredartiste'] = password_hash($data['motdepassepreferredartiste'], PASSWORD_DEFAULT);
    // var_dump($data['motdepassepreferredartiste']);
    try {
        $id = add_new_preferredartiste($data);
        header("location: ".MARLENE_PATH."home.php/?ctrl=preferredartiste&fct=display_show_preferredartiste&id=".$id);
        // display_show_preferredartiste($id);
        
    } catch (\Throwable $th) {
        
        header("location: ".SRV_PATH);
        // return [
        //     'page' => 'home',
        //     'title' => 'Admin preferredartiste',
        //     'preferredartistes' => $data
        // ]; 
    }
           
}

function remove_preferredartiste($id):void
{
    // delete_preferredartiste($id);
    // index();
    index_preferredartiste();
}


/**
 * 
 * 
 * 
 *              FONCTION DE TRAITEMENT
 * 
 *  toutes les fonctions utiles aux traitement des données preferredartistes
 * 
 * 
 * 
*/

function upload_image(): void{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagepreferredartiste"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["imagepreferredartiste"]["tmp_name"]);
    
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
  }
  
// /**
//  *      fonction qui compare un mot de passe en paramètre au mot de passe
//  *      preferredartiste enregistrer en BDD  
//  * 
//  * 
//  * @param string $password mot de passe à comparer.
//  * @param int $id id d'un preferredartiste
//  * @return bool Returns `true` si le hash du mot de passe correspond,
//  *                      `false` sinon.
// */
// function check_password_preferredartiste(string $passwd,int $id): bool{
//     // $passwd est un hash car c'est un hash qui est enregistrer en BDD
// if(get_preferredartiste_passwd($id) == $passwd){
//     echo "c'est le même mot de passe";
//     $is_same_password = true;
// }else{
//     $is_same_password = false;
//     echo "ce n'est pas le même mot de passe";
// }

// return $is_same_password;

// }


/**
 * fonction qui update le mot de passe d'un preferredartiste 
 * 
 * 
 * @param string $password The user's password.
 * @param string $hash A hash created by password_hash().
 * @return int $id id du preferredartiste ou 0
*/

function pwd_change($id): void{
    /* fonction qui update le mot de passe d'un preferredartiste 

    récupérer l'ancien et le nouveau mot de passe
    check que l'ancien mot de passe soit correct
        si oui : update du mot de passe en BDD
        si non : renvoie sur la page du formulaire
    
    retourne l'identifiant du preferredartiste modifier
    */
    echo 'on eest dans passwod change';
    var_dump_pre($_POST);
    // si on a les données nécessaire, on change le mot de passe
    if(isset($_POST['old_passwd']) && $_POST['motdepassepreferredartiste'] !== null )
     {
        $change = False;

        $passwd_form= $_POST['old_passwd'];
        $passwd_db = get_preferredartiste_passwd($_POST['idpreferredartiste']);
        
        $test = password_verify($passwd_form, $passwd_db);

        if($test){
            echo "c'est le bon mot de passe";
            
            try{
                $hash_passwd = password_hash($_POST['motdepassepreferredartiste'], PASSWORD_DEFAULT);
                change_password_preferredartiste($hash_passwd, $id);
                $change = True;
            }catch(Exception $e){
                echo "". $e->getMessage() ."";
            }
        }else{
            echo "FAUX mot de passe";
        }
    }
    if($change){
        display_show_preferredartiste($id);
    }else{
        display_form_psswd_preferredartiste($id);
    }

        
    // return [
    //     'page' => 'form_passwd_preferredartiste',
    //     'title' => 'Changement de mot de passe',
    //     'preferredartistes' => $preferredartistes,
    // ];


}



/**
 * fonction qui update le mot de passe d'un preferredartiste 
 * 
 * 
 * @param string $password The user's password.
 * @param string $hash A hash created by password_hash().
 * @return bool Returns `true` if the password and hash match, or `false` otherwise.
*/
