<?php

require_once './../fonctionsBDD/ConnectionBDD.php';

function get_all_galery(){
    /**
     * Récupère dans la base de donnée toutes les infos de toutes les galeries.
    * 
    */
    $connex=connectionBDD(); //Connexion à la BDD
    try { // Essaye de faire les actions suivantes
    $sql="SELECT * FROM galeries"; // Requette envoyer à la BDD pour récupérer des infos
    // print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchAll();
    }
    catch (Exception $e) { //Si échec
        print "Erreur pour retourner les infos de la galerie : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu;
}

function get_galery_by_id($idgalerie){
    /**
     * Récupère dans la base de donnée toutes les infos d'une galerie grâce à son id.
    * 
    */
    $connex=connectionBDD(); //Connexion à la BDD
    try {
    $sql="SELECT * FROM galeries WHERE idgalerie =$idgalerie"; // Requette envoyer à la BDD pour récupérer des infos
    //continuer la requête avec un INNER JOIN pour récup également l'idartiste de la table EXPOSER en lien avec l'idgalerie.
    print $sql;
    $res1=$connex->query($sql);
    $resu=$res1->fetchAll();
    }
    catch (Exception $e) { //Si échec
        print "Erreur pour récupérer les infos de la galerie ayant pour id celui passer en entrée : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu; // Affiche le résultat de la requête
}

function get_galery_by_cp($cpgalerie){
    /**
     * Récupère dans la base de donnée toutes les infos d'une galerie grâce à son code postale.
     * 
     */
    $connex=connectionBDD(); //Connexion à la BDD
    try {
    $sql="SELECT * FROM galeries WHERE cpgalerie = '".$cpgalerie."'"; // Requette envoyer à la BDD pour récupérer des infos
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchAll();
    }
    catch (Exception $e) { //Si échec
        print "Erreur pour lister les galeries de la BDD ayant pour code postal celui passer en entrée : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu; // Affiche le résultat de la fonction
}

function get_list_galery($nom){
    /**
     * Liste, depuis les infos de la BDD, toutes les galeries présentes 
     * pour que les artistes exposent leurs oeuvres.
     *  
     */
    $connex=connectionBDD(); //Connexion à la BDD
    try {
    $sql= "SELECT nomgalerie, villegalerie FROM galeries WHERE nomgalerie = $nom "; // Requette envoyer à la BDD pour récupérer des infos
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchAll();
    }
    catch (Exception $e) { //Si échec
        print "Erreur pour lister les galeries de la BDD : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu; // Affiche le résultat de la fonction
}

function delete_galery($nom){
    /**
     * Fct qui supprime la galerie de la base de donné qui à pour nom 
     * celui rentré en paramètre.
     * 
     */
    $connex=connectionBDD();
    try {
    $sql= "DELETE * FROM galeries WHERE nomgalerie = $nom ";       // Requette envoyer à la BDD pour supprimer des infos
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchAll();
    }
    catch (Exception $e) { //Si échec
        print "Erreur pour supprimer la galerie de la BDD : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu; // Affiche le résultat de la fonction
}

function add_galery(string $data){
    /** Fonction qui enregiste une new galerie dans la bdd 
     *
     *  Retourne l'identifiant choisit lors de l'injection et le nom de la galerie fraichement ajoutée
     *  
     */
    $connex=connectionBDD();        // Connexion à la BDD
    try {
    echo $data;
    $sql= "INSERT INTO galeries (imagegalerie ,nomgalerie , descriptiongalerie, villegalerie, adressegalerie, cpgalerie, paysgalerie) 
    VALUES $data "; // Requette envoyer à la BDD pour créer une nouvelle galerie.
    print $sql;
    $res=$connex->query($sql);
    // $resu=$res->fetchColumn();
    // $resu= $res->fetchAll();
    } 
    catch (Exception $e) { //Si échec
        print "Erreur pour ajouter la galerie à la BDD : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    // return $resu; // Affiche le résultat de la fonction
}

function edit_galery(string $data){
    /** Fonction qui enregiste une new galerie dans la bdd 
     *
     *  Retourne l'identifiant choisit lors de l'injection et le nom de la galerie fraichement ajoutée
     *  
     */
    $connex=connectionBDD();        // Connexion à la BDD
    try {
    echo $data;
    $sql= "UPDATE INTO galeries (nomgalerie, villegalerie, adressegalerie, paysgalerie, cpgalerie, descriptiongalerie) 
    VALUES $data RETURNING (idgalerie, nomgalerie) "; // Requette envoyer à la BDD pour créer une nouvelle galerie puis renvoyer son id et son nom.
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchColumn();
    // $resu= $res->fetchAll();
    } 
    catch (Exception $e) { //Si échec
        print "Erreur pour ajouter la galerie à la BDD : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu; // Affiche le résultat de la fonction
}

function get_artiste_with_galery($idgalerie){
    /**
     * Récupère dans la base de donnée les id des artiste qui exposent dans la galerie séléctionner.
    * 
    */
    $connex=connectionBDD(); //Connexion à la BDD
    try {
    $sql = "SELECT idartiste FROM EXPOSER INNER JOIN GALERIE ON EXPOSER.idgalerie = '".$idgalerie."'"; // Requette envoyer à la BDD pour récupérer des infos
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchAll();
    }
    catch (Exception $e) { //Si échec
        print "Erreur pour retourner les infos concernat l'/les artiste(s) exposant dans la galerie séléctionner : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu; // Affiche le résultat de la fonction
}

?>