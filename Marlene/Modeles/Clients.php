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
    $sql = "SELECT * FROM clients ORDER BY idclient DESC";
    // pas de prepare car pas de paramètre
    $res = $connex->query($sql);
    $resu = $res->fetchall();
    // var_dump( $resu[0]);
  } catch (PDOException $e) { // si échec
    print "Erreur pour retourner les pseudo clients : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

/**
 *      fonction qui retourne les emails de tous les clients 
 *      ( fonction SELECT  )
 * 
 * @return array $resu list de tous les emails de tous les clients
*/
function get_all_clients_email(): array
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT emailclient FROM clients ORDER BY idclient";
    // pas de prepare car pas de paramètre
    $res = $connex->query($sql);
    $resu = $res->fetchall();
    // var_dump( $resu[0]);
  } catch (PDOException $e) { // si échec
    print "Erreur pour retourner les emails clients : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

/**
 *      fonction qui retourne tout les pseudo de tous les clients 
 *      ( fonction SELECT  )
 * 
 * @return array $resu list de tout les pseudo de tous les clients
*/
function get_all_clients_pseudo(): array
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT pseudoclient FROM clients ORDER BY idclient";
    // pas de prepare car pas de paramètre
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
    $sql = $connex->prepare("SELECT * FROM clients  WHERE idclient = ? ");
    $sql->execute([$id]); 
    $resu = $sql->fetch();

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
function get_client_id(string $pseudo): string
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = $connex->prepare("SELECT idclient FROM clients  WHERE pseudoclient = ? OR emailclient = ? ");
    $sql->execute([$pseudo, $pseudo]); 
    $resu = $sql->fetch()[0];

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
    $sql = $connex->prepare("SELECT motdepasseclient FROM clients  WHERE idclient = ? ");
    $sql->execute([$id]); 
    $resu = $sql->fetch()[0];

    // print($resu);
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
 *      fonction qui enregistre un nouveau client et retourne son id 
 *      ( fonction INSERT INTO  )
 * 
 * @param array $data données client
 * @return int $id id du client nouvellement créé
*/
function add_new_client(array $data): string
{
  // var_dump_pre($data);
  $connex = connectionBDD(); // on se connect
  try {    
    $sql = $connex->prepare(
  "INSERT INTO clients (
        nomclient, prenomclient, adresseclient, villeclient, emailclient, motdepasseclient, pseudoclient, imageclient, cpclient ) 
        VALUES ( :nomclient, :prenomclient, :adresseclient, :villeclient, :emailclient, :motdepasseclient, :pseudoclient, :imageclient, :cpclient )
        RETURNING idclient
        ");
        
    $sql->bindParam(':nomclient', $data['nomclient'], PDO::PARAM_STR);
    $sql->bindParam(':prenomclient', $data['prenomclient'], PDO::PARAM_STR);
    $sql->bindParam(':adresseclient', $data['adresseclient'], PDO::PARAM_STR);
    $sql->bindParam(':villeclient', $data['villeclient'], PDO::PARAM_STR);
    $sql->bindParam(':emailclient', $data['emailclient'], PDO::PARAM_STR);
    $sql->bindParam(':motdepasseclient', $data['motdepasseclient'], PDO::PARAM_STR);
    $sql->bindParam(':pseudoclient', $data['pseudoclient'], PDO::PARAM_STR);
    $sql->bindParam(':imageclient', $data['imageclient'], PDO::PARAM_STR);
    $sql->bindParam(':cpclient', intval($data['cpclient']), PDO::PARAM_INT);
    $sql->execute();
    // print($id );

    
    // $sql = "INSERT INTO clients 
    //   (
    //     nomclient, prenomclient, adresseclient, villeclient, emailclient, motdepasseclient, pseudoclient, imageclient, cpclient
    //   )
    //   VALUES 
    //   (
    //     '" . $data['nomclient'] . "', '" . $data['prenomclient'] . "', '" . $data['adresseclient'] . "', '" . $data['villeclient'] . "', '" . $data['emailclient'] .
    //   "', '" . $data['motdepasseclient'] . "', '" . $data['pseudoclient'] . "', '" . $data['imageclient'] . "', '" . $data['cpclient'] . "'
    //   ) 
    //   RETURNING idclient";
    // print $sql;
    // $res = $connex->query($sql);
    $id = $sql->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
    $msg = "Votre compte à bien été créé, vous pouvez vous connecter";
  } catch (PDOException $e) { // si échec
    $msg = "Erreur pour l'enregistrement " . $data['pseudoclient'] . "  : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $msg;
}


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
    
    $sql = $connex->prepare("UPDATE clients SET motdepasseclient = ?  WHERE idclient = ? ");
    // $sql->bindParam(':password', $password, PDO::PARAM_STR);
    // $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute([$password, $id]); 

  } catch (PDOException $e) { //Si échec
    print "Erreur pour mettre à jour le mot de passe du client : " . $e->getMessage();
    die(""); //Arrêt du script execute([150, 'rouge'])
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
    $sql =  $connex->prepare(
      "UPDATE clients (
            nomclient = :nomclient,  prenomclient = :prenomclient,  adresseclient = :adresseclient,  
            villeclient = :villeclient,  emailclient = :emailclient,  
            pseudoclient = :pseudoclient,  cpclient = :cpclient ) 
            ");
            
        $sql->bindParam(':nomclient', $data['nomclient'], PDO::PARAM_STR);
        $sql->bindParam(':prenomclient', $data['prenomclient'], PDO::PARAM_STR);
        $sql->bindParam(':adresseclient', $data['adresseclient'], PDO::PARAM_STR);
        $sql->bindParam(':villeclient', $data['villeclient'], PDO::PARAM_STR);
        $sql->bindParam(':emailclient', $data['emailclient'], PDO::PARAM_STR);
        $sql->bindParam(':pseudoclient', $data['pseudoclient'], PDO::PARAM_STR);
        $sql->bindParam(':cpclient', intval($data['cpclient']), PDO::PARAM_INT);
        $sql->execute();
        
  } catch (PDOException $e) 
  { // si échec
    print "Erreur pour mettre à jour le clients   : " . $e->getMessage();
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
 * @param string $id id d'un client
 * @return array $resu list de toutes les informations de tous les clients
*/
function delete_client($id): void
{
  $connex = connectionBDD();
  try {
    
    $sql = $connex->prepare("DELETE FROM clients WHERE idclient = ? ");
    $sql->execute([$id]); 

  } catch (PDOException $e) { // si échec
    print "Erreur lors de la suppression du client : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }

  disconnectionBDD($connex);
}

/**
 *      fonction qui permet de se connecter à son compte 
 *      ( fonction SELECT  )
 * 
 * 
 * @param string $pseudo pseudo du client
 * @return array $resu list de l'id et du pseudo clients
*/
function login_client_in_db($pseudo, $hash_passwd)
{
  //Fonction qui récupère les login d'un client avant de le logguer.
  $connex = connectionBDD();
  try {

    $sql = $connex->prepare("SELECT idclient FROM clients 
                                    WHERE pseudoclient =  :pseudo");
    
    $sql->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    
    $sql->execute(); 
    $resu = $sql->fetch()[0];
    
  } catch (PDOException $e) { // si échec
    print "Erreur pour lors de la connexion du client : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}


?>