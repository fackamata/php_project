<?php
/**
 *                  MARLENE FONCTION
 * 
 *      une série de fonction qui sont utiles dans les différents traitement
 * 
 *      toutes les fonctions qui ne sont pas lié au traitement
 */

/**
 * fonction vérifie que le bon utilisateur soit connecté au serveur
*/
function is_auth_as($srv_user = "lizzim"): bool
{
        
    if (isset($_SERVER['PHP_AUTH_USER']) And $_SERVER['PHP_AUTH_USER'] == $srv_user) {
        ?>
        <p>Hello <?php echo $_SERVER['PHP_AUTH_USER']?>.</p>
        <?php
    } else {
        ?>
        <p>Hello <?php echo $_SERVER['PHP_AUTH_USER']?>.</p>
        <p>Vous n'êtes pas autoriser à acceder à cette ressources</p>
        <p>Seulement </p>
        <?php
    }
}
    

function root_dir_name(): string {
    $srv = $_SERVER . "RT/2ALT5/";
    return $srv;
}

function pre_dump(string $var): void
{    
     /**
     * Fonction pour faire un var_dump avec <pre>
     */
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function test_id(string $id, string $db_table): mixed
{
    /**
     * fonction pour tester si un id est bien un string modifiable en int
     * 
     * et controle que l'id rechercher est bien en db
     */

    try {
        $id = intval($id);
    } catch (Throwable $e) {
        echo $e->getMessage(),"l'indice reçue n'est pas un nombre : ".$e ;
        $id = False;
    }
    // TODO: faire la vérification que l'id est bien retourne pour la table demander

    return $id;
}

function render_view(string $view, array $data ): string
{

    /**
     * ob_start() - enclenche la temporisation de sortie
     *  
     *  tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes, n'est envoyé au navigateur
     * 
     * Avertissement
     * 
     */
    ob_start(); // démarre la temporisation de sortie
    extract($data); // extraie les données qu'on utilise dans la vue
    require_once $view;
    
    $view_content = ob_end_flush(); // envoie les données du tampon de sortie et éteint la tamportisation de sortie
    // $view_content = ob_get_clean(); // fait le get content et le nettoie la mémoire tampon
    /** TODO: REMOVE
     * 
     * 
     * ob_get_contents() - Retourne le contenu du tampon de sortie
     * ob_end_clean() - Détruit les données du tampon de sortie et éteint la tamporisation de sortie
     * ob_end_flush() - Envoie les données du tampon de sortie et éteint la tamporisation de sortie
     * ob_implicit_flush() - Active/désactive l'envoi implicite
     * ob_gzhandler() - Fonction de rappel pour la compression automatique des tampons
     * ob_iconv_handler() - Gestionnaire de sortie pour maîtriser le jeu de caractères de sortie
     * mb_output_handler() - Fonction de traitement des affichages
     * ob_tidyhandler() - Fonction de rappel ob_start pour réparer le buffer
     *       
     * Attention :
     * Quelques serveurs web (par exemple Apache) modifient le dossier de travail d'un script lorsqu'il 
     * appelle une fonction de rappel. Vous pouvez revenir à un comportement normal en ajoutant 
     * chdir(dirname($_SERVER['SCRIPT_FILENAME'])) dans votre fonction de rappel.
     */
    return $view_content;
}   


?>