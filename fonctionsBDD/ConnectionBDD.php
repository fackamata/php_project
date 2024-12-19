<?php
function connectionBDD($fichierParametre='./../Utils/paramCon.php'): PDO {
/*---------------------------------------------
Création de la connexion à la base de données
retourne la ressource connecteur à la base de données
Paramètres d'entrées :
 - $fichierParametre :  nom du fichier qui contient les paramètres de connexion
   ce fichier devra définir les variables suivantes :
    $srv
    $port
    $dbname
    $user
    $pass
------------------------------------------------*/
    include $fichierParametre; // on "inclut" le fichier source contenant du code
    $dsn='pgsql:host='.$srv.';dbname='.$dbname.';port='.$port;

    // connexion à la bdd (connexion non persistante)
    try {
        $connex = new PDO($dsn, $user, $pass); // tentative de connexion
        print "Connecté :)<br />";// si réussite
    } catch (PDOException $e) { // si échec
        print "Erreur de connexion à la base de données ! : " . $e->getMessage();
        die(""); // Arrêt du script - sortie.
    }
    return $connex; // on retourne le connecteur (à l'appelant)
}


function disconnectionBDD($connex) {
/*---------------------------------------------
détruit la connexion
paramètres d'entrée
 - $connex qui est la ressource (connecteur) à la base de données à détruire
------------------------------------------------*/
    $connex = null; // fermeture de la connexion a la base de donnees (même si demande de connexion persistante).
}
?>
