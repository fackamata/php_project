<?php
/**
 *    Module pour gérer la table Acheter (Buy)
 * 
 * idacheter 	integer
 * refidclientachat 	integer 	
 * refidobjectachat 	integer 	
 * quantiteachat 	integer 	
 * dateachat 	timestamp without time zone
 */

require_once __DIR__."/../Config/ConnexionDB.php";

/**
 *      fonction qui retourne toutes les informations de tous les achats 
 *      ( fonction SELECT  )
 * 
 * @return array $resu list de toutes les informations de tous les achats
*/
function get_all_buys(): array
{
  $connex = connectionBDD(); // on se connect
  try {
    
    $sql = "SELECT
              -- ou on sélectionne uniquement ceux qu'on veux
              acheter.idacheter AS idacheter,
              acheter.quantiteachat AS quantiteachat,
              clients.pseudoclient AS pseudoclient,
              objects.nomobject AS nomobject
            FROM acheter
            INNER JOIN clients
              ON clients.idclient = acheter.refidclientachat 
            JOIN objects
              ON objects.idobject = acheter.refidobjectachat  
            ORDER BY acheter.idacheter DESC;
        ";
      
    $res = $connex->query($sql);
    $resu = $res->fetchall();

  } catch (PDOException $e) { // si échec
    print "Erreur pour retourner tous les achats : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}


/**
 *      fonction qui retourne toutes les informations de tous les achats 
 *      ( fonction SELECT  )
 * 
 * @return array $resu list de toutes les informations de tous les achats
*/
function get_all_buys_for_client($idclient): array
{
  $connex = connectionBDD(); // on se connect
  try {
    
    // $sql = "SELECT
    
    $sql = $connex->prepare(
    // $sql = $connex->query(
        "SELECT
              *
              -- ou on sélectionne uniquement ceux qu'on veux
              -- acheter.quantiteachat AS quantiteachat,
              -- acheter.dateachat AS dateachat,
              -- objects.nomobject AS nomobject
              -- objects.imageobject AS imageobject
              -- objects.prixobject AS prixobject
            FROM acheter
            INNER JOIN clients
              ON clients.idclient = acheter.refidclientachat 
            JOIN objects
              ON objects.idobject = acheter.refidobjectachat  
            WHERE clients.idclient = :refidclientachat
            ORDER BY acheter.dateachat DESC;
        ");
      
    $sql->bindParam(':refidclientachat', $idclient, PDO::PARAM_INT);
    // $res = $connex->query($sql);
    $sql->execute();
    // $resu = $sql->fetch();
    $resu = $sql->fetchall();

  } catch (PDOException $e) { // si échec
    print "Erreur pour retourner tous les achats : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

/**
 *      fonction qui retourne toutes les informations d'un achat 
 *      ( fonction SELECT  )
 * 
 * @param int $id id d'un achat
 * @return array $resu liste de toutes les informations d'un achat
*/
function get_buy_by_id(int $id): array
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = $connex->prepare("SELECT * FROM acheter WHERE idacheter = ? ");
    $sql->execute([$id]);
    $resu = $sql->fetch();

  } catch (PDOException $e) { // si échec
    print "Erreur pour récupérer tous les achats : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}


/**
 *      fonction qui enregistre un nouvel achat et retourne son id 
 *      ( fonction INSERT INTO  )
 * 
 * @param array $data données achat
 * @return int $id id de l'achat nouvellement créé
*/
function add_new_buy(array $data): int
{
  // var_dump_pre($data);
  $connex = connectionBDD(); // on se connect
  try {   
    $sql = $connex->prepare(
  "INSERT INTO acheter (
        refidclientachat, refidobjectachat, quantiteachat ) 
        VALUES ( :refidclientachat, :refidobjectachat, :quantiteachat)
        RETURNING idacheter
        ");
        
    $sql->bindParam(':refidclientachat', $data['idclient'], PDO::PARAM_STR);
    $sql->bindParam(':refidobjectachat', $data['idobject'], PDO::PARAM_STR);
    $sql->bindParam(':quantiteachat', intval($data['quantiteachat']), PDO::PARAM_INT);
    $sql->execute();


    // $sql = "INSERT INTO buys 
    //   (
    //     nombuy, prenombuy, adressebuy, villebuy, emailbuy, motdepassebuy, pseudobuy, imagebuy, cpbuy
    //   )
    //   VALUES 
    //   (
    //     '" . $data['nom'] . "', '" . $data['prenom'] . "', '" . $data['adresse'] . "', '" . $data['ville'] . "', '" . $data['email'] .
    //   "', '" . $data['motdepasse'] . "', '" . $data['pseudobuy'] . "', '" . $data['imagebuy'] . "', '" . $data['cpbuy'] . "'
    //   ) 
    //   RETURNING idacheter";
    // $res = $connex->query($sql);
    $id = $sql->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  } catch (PDOException $e) { // si échec
    print "Erreur pour ajouter l'achat : " . $e->getMessage();
    $id = 0;
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $id;
}


/**
 *      fonction qui modifie les informations d'un achat et retourne son id 
 *      ( fonction UPDAT  )
 * 
 * @param array $data données de l'achat
 * @return int $id id de l'achat
*/
function update_buy_db(array $data): int
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "UPDATE buys 
    SET nombuy = '" . $data['nom'] . "', 
        prenombuy = '" . $data['prenom'] . "', 
        imagebuy = '" . $data['imagebuy'] . "'
        cpbuy = '" . $data['cpbuy'] . "'
    WHERE idacheter = '" . $data['id'] . "' 
    RETURNING idacheter";

    $res = $connex->query($sql);
    $id = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  } catch (PDOException $e) 
  { // si échec
    print "Erreur pour ajouter le buys " . $data['nom'] . "  : " . $e->getMessage();
    $id = 0;
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $id;
}


/**
 *      fonction qui supprime un achat  
 *      ( fonction DELETE  )
 * 
 * 
 * @param string $id id d'un achat
 * @return void
*/
function delete_buy($id): void
{
  //Enregistre les modifications sur un achat par son id_buy

  $connex = connectionBDD();
  try {
    $sql = " DELETE FROM acheter WHERE idacheter = '" . $id . "'";
    $res = $connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
    // $resu=$res->fetchOne();
  } catch (PDOException $e) { // si échec
    print "Erreur pour la modification d'un achat : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }

  disconnectionBDD($connex);
}

