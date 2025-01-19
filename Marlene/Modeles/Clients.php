<?php
require_once __DIR__."/../Config/ConnexionDB.php";

/**
 *      fonction qui retourne toutes les informations de tous les clients 
 *      ( fonction SELECT  )
 * 
 * @return array $resu list de toutes les informations de tous les clients
*/
function get_all_clients(): array
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT * FROM clients ORDER BY idclient";
    $res = $connex->query($sql);
    $resu = $res->fetchall();
  } catch (PDOException $e) { // si échec
    print "Erreur pour retourner tous les clients : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

/**
 *      fonction qui retourne tous les informations d'un client 
 *      ( fonction SELECT  )
 * 
 * @param int $id id d'un client
 * @return array $resu liste de toutes les informations d'un client
*/
function get_client_by_id(int $id): array
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT * FROM clients WHERE idclient = '" . $id . "'";
    $res = $connex->query($sql);
    $resu = $res->fetch();
  } catch (PDOException $e) { // si échec
    print "Erreur pour récupérer tous les clients : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

/**
 *      fonction qui retourne tous les clients dans un tableau 
 *      ( fonction SELECT  )
 * 
 * @param int $id id d'un client
 * @return hash $passwd list de toutes les informations de tous les clients
*/
function get_client_passwd(int $id): hash
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT motdepasseclient FROM clients WHERE idclient = '" . $id . "'";
    $res = $connex->query($sql);
    var_dump($res);
    $resu = $res->fetch();
    echo "le mot de passe récupe en BDD: " . $resu;
  } catch (PDOException $e) { // si échec
    print "Erreur pour récupérer le mot de passe du clients : " . $e->getMessage();
    $resu = "";
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  // TODO VOIR si c'est bien le hash ou 1er élément
  return $resu;
}


/**
 *      fonction qui enregistre un nouveau client et retourne son id 
 *      ( fonction INSERT INTO  )
 * 
 * @param array $data données client
 * @return int $id id du client nouvellement créé
*/
function add_new_client(array $data): int
{
  // var_dump_pre($data);
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "INSERT INTO clients 
      (
        nomclient, prenomclient, adresseclient, villeclient, emailclient, motdepasseclient, pseudoclient, imageclient, cpclient
      )
      VALUES 
      (
        '" . $data['nom'] . "', '" . $data['prenom'] . "', '" . $data['adresse'] . "', '" . $data['ville'] . "', '" . $data['email'] .
      "', '" . $data['motdepasse'] . "', '" . $data['pseudoclient'] . "', '" . $data['imageclient'] . "', '" . $data['cpclient'] . "'
      ) 
      RETURNING idclient";
    $res = $connex->query($sql);
    $id = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  } catch (PDOException $e) { // si échec
    print "Erreur pour ajouter le clients " . $data['nom'] . "  : " . $e->getMessage();
    $id = 0;
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $id;
}



// function get_password(int $id): hash{
//      /* fonction qui retourne un mot de passe client  
//       ( fonction SELECT )

//       paramètres d'entrée
//       - $id : l'id du client dont on veux le mot de passe

//       retourne:
//         - string $password: le mot de passe
//     */

//     $connex=connectionBDD();
//     try{
//       $sql="SELECT motdepasseclient FROM clients WHERE idclient='".$id."'";
//       // print $sql;
//       $res=$connex->query($sql);
//       $resu=$res->fetch();
//     }
//     catch (PDOException $e) { //Si échec
//       print "Erreur pour récupérer le mot de passe du client : " . $e->getMessage();
//       die(""); //Arrêt du script
//     }
//     disconnectionBDD($connex);
//     return $resu;
//   }  


/**
 *      fonction qui change le mot de passe d'un client 
 *      ( fonction UPDATE  )
 * 
 * 
 * @param hash $password mot de passe à comparer.
 * @param int $id id d'un client
 * @return void
*/
function change_password(hash $password, int $id): void
{
  $connex = connectionBDD();
  try {
    $sql = "UPDATE clients SET motdepasseclient = '" . $password . "' WHERE idclient='" . $id . "'";
    // print $sql;
    $res = $connex->query($sql);
  } catch (PDOException $e) { //Si échec
    print "Erreur pour mettre à jour le mot de passe du client : " . $e->getMessage();
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
}

/**
 *      fonction qui modifie les informations d'un client et retourne son id 
 *      ( fonction UPDAT  )
 * 
 * @param string $password mot de passe à comparer.
 * @return int $id id du client
*/
function update_client_db(array $data): int
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "UPDATE clients 
    SET nomclient = '" . $data['nom'] . "', 
        prenomclient = '" . $data['prenom'] . "', 
        adresseclient = '" . $data['adresse'] . "', 
        villeclient = '" . $data['ville'] . "', 
        emailclient = '" . $data['email'] . "', 
        motdepasseclient = '" . $data['motdepasse'] . "'
        pseudoclient = '" . $data['pseudoclient'] . "'
        imageclient = '" . $data['imageclient'] . "'
        cpclient = '" . $data['cpclient'] . "'
    WHERE idclient = '" . $data['id'] . "' 
    RETURNING idclient";

    $res = $connex->query($sql);
    $id = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  } catch (PDOException $e) 
  { // si échec
    print "Erreur pour ajouter le clients " . $data['nom'] . "  : " . $e->getMessage();
    $id = 0;
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $id;
}


/**
 *      fonction qui supprime un client  
 *      ( fonction DELETE  )
 * 
 * 
 * @param string $password mot de passe à comparer.
 * @param string $id id d'un client
 * @return array $resu list de toutes les informations de tous les clients
*/
function delete_client($idclient): void
{
  //Enregistre les modifications sur un client par son id_client

  $connex = connectionBDD();
  try {
    $sql = " DELETE FROM clients WHERE idclient = '" . $idclient . "'";
    $res = $connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
    // $resu=$res->fetchOne();
  } catch (PDOException $e) { // si échec
    print "Erreur pour la modification d'un client : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }

  disconnectionBDD($connex);
  // return $res;					
}

/**
 *      fonction qui permet de se connecter à son compte 
 *      ( fonction SELECT  )
 * 
 * 
 * @param string $password mot de passe à comparer.
 * @param string $id id d'un client
 * @return array $resu list de toutes les informations de tous les clients
*/
function login_client($login)
{
  //Fonction qui récupère les login d'un client avant de le logguer.

  $connex = connectionBDD();
  try {
    $sql = "SELECT motdepasseclient, pseudoclient, idclient FROM clients 
      WHERE pseudoclient = '" . $login . "' 
      OR  WHERE emailclient = '" . $login . "'";
    print $sql;
    $res = $connex->query($sql);
    $resu = $res->fetch();
  } catch (PDOException $e) { // si échec
    print "Erreur pour la modification d'un client : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

?>