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
    // var_dump( $resu[0]);
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
function get_client_by_id(int $id)
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
 *      fonction qui retourne le mot de passe client à partir de son pseudo ou email 
 *      ( fonction SELECT  )
 * 
 * @param string $pseudo le pseudo ou l'email du client
 * @return string $passwd le mot de passe du clients
*/
function get_client_passwd_by_pseudo(string $pseudo): string
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT motdepasseclient FROM clients WHERE emailclient = '" . $pseudo . "' OR pseudoclient = '".$pseudo."'";
    // print($sql);
    $res = $connex->query($sql);
    $resu = $res->fetch()[0];
    // echo "le mot de passe récupe en BDD: " . $resu;
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
 *      fonction qui retourne tous les clients dans un tableau 
 *      ( fonction SELECT  )
 * 
 * @param int $id id d'un client
 * @return string $passwd list de toutes les informations de tous les clients
*/
function get_client_passwd(int $id): string
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT motdepasseclient FROM clients WHERE idclient = '" . $id . "'";
    $res = $connex->query($sql);
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
  var_dump_pre($data);
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "INSERT INTO clients 
      (
        nomclient, prenomclient, adresseclient, villeclient, emailclient, motdepasseclient, pseudoclient, imageclient, cpclient
      )
      VALUES 
      (
        '" . $data['nomclient'] . "', '" . $data['prenomclient'] . "', '" . $data['adresseclient'] . "', '" . $data['villeclient'] . "', '" . $data['emailclient'] .
      "', '" . $data['motdepasseclient'] . "', '" . $data['pseudoclient'] . "', '" . $data['imageclient'] . "', '" . $data['cpclient'] . "'
      ) 
      RETURNING idclient";
    print $sql;
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
 * @param string $password mot de passe à comparer.
 * @param int $id id d'un client
 * @return void
*/
function change_password_client(string $password, int $id): void
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
function update_client_db(array $data, int $id): void
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "UPDATE clients 
    SET nomclient = '" . $data['nomclient'] . "', 
        prenomclient = '" . $data['prenomclient'] . "', 
        adresseclient = '" . $data['adresseclient'] . "', 
        villeclient = '" . $data['villeclient'] . "', 
        emailclient = '" . $data['emailclient'] . "', 
        pseudoclient = '" . $data['pseudoclient'] . "',

        cpclient = '" . $data['cpclient'] . "'
    WHERE idclient = '" . $id . "'";

    // $res = $connex->query($sql);
    $connex->query($sql);
    // $res = 
    // $id = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  } catch (PDOException $e) 
  { // si échec
    print "Erreur pour mettre à jour le clients " . $data['nom'] . "  : " . $e->getMessage();
    // $id = 0;
    die(""); // Arrêt du script - sortie.             imageclient = '" . $data['imageclient'] . "'
  }
  disconnectionBDD($connex);
  // return $id;
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
    print "Erreur lors de la suppression du client : " . $e->getMessage();
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
 * @param string $login email ou pseudo du client
 * @param string $hash_passwd le hash du mot de passe client
 * @return array $resu list de l'id et du pseudo clients
*/
function login_client_in_db($login, $hash_passwd)
{
  //Fonction qui récupère les login d'un client avant de le logguer.
  echo $hash_passwd;
  $connex = connectionBDD();
  try {
    $sql = "SELECT idclient FROM clients 
      WHERE pseudoclient = '" . $login . "' 
            OR emailclient = '" . $login . "'";
    print $sql;
    $res = $connex->query($sql);
    $resu = $res->fetch()[0];
    print($resu);
  } catch (PDOException $e) { // si échec
    print "Erreur pour lors de la connexion du client : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

?>