<?php
/**
 *    Module pour gérer la table Encherir (Bid)
 * 
 * idencherir 	integer 	
 * refidclientencherir 	integer 	
 * refidoeuvresencherir 	integer 	
 * quantiteencherir 	integer 	
 * dateencherir timestamp without time zone
 * 
*/

require_once __DIR__."/../Config/ConnexionDB.php";

/**
 *      fonction qui retourne toutes les informations de toutes les encheres 
 *      ( fonction SELECT  )
 * 
 * @return array $resu list de toutes les informations de toutes les encheres
*/
function get_all_bids(): array
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT * FROM encherir ORDER BY idencherir";
        // JOIN Clients ON Clients.idclient = Encherir.refidclientencherir
        // JOIN Objects ON Objects.idobject = Encherir.refidobjetencherir
    $res = $connex->query($sql);
    $resu = $res->fetchall();
  } catch (PDOException $e) { // si échec
    print "Erreur pour retourner toutes les encheres : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

/**
 *      fonction qui retourne toutes les informations d'une enchères 
 *      ( fonction SELECT  )
 * 
 * @param int $id id d'une enchères
 * @return array $resu liste de toutes les informations d'une enchères
*/
function get_bid_by_id(int $id): array
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT * FROM encherir WHERE idencherir = '" . $id . "'";
    $res = $connex->query($sql);
    $resu = $res->fetch();
  } catch (PDOException $e) { // si échec
    print "Erreur pour récupérer toutes les encheres : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}


/**
 *      fonction qui enregistre une nouvelle enchères et retourne son id 
 *      ( fonction INSERT INTO  )
 * 
 * @param array $data données enchères
 * @return int $id id de l'enchères nouvellement créé
*/
function add_new_bid(array $data): int
{
  // var_dump_pre($data);
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "INSERT INTO encherir
      (
        nombid, prenombid, adressebid, villebid, emailbid, motdepassebid, pseudobid, imagebid, cpbid
      )
      VALUES 
      (
        '" . $data['nom'] . "', '" . $data['prenom'] . "', '" . $data['adresse'] . "', '" . $data['ville'] . "', '" . $data['email'] .
      "', '" . $data['motdepasse'] . "', '" . $data['pseudobid'] . "', '" . $data['imagebid'] . "', '" . $data['cpbid'] . "'
      ) 
      RETURNING idencherir";
    $res = $connex->query($sql);
    $id = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  } catch (PDOException $e) { // si échec
    print "Erreur pour ajouter le enchere " . $data['nom'] . "  : " . $e->getMessage();
    $id = 0;
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $id;
}


/**
 *      fonction qui modifie les informations d'une enchères et retourne son id 
 *      ( fonction UPDAT  )
 * 
 * @param array $data données de l'achat
 * @return int $id id de l'achat
*/
function update_bid_db(array $data): int
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "UPDATE encherir
    SET nombid = '" . $data['nom'] . "', 
        prenombid = '" . $data['prenom'] . "', 
        imagebid = '" . $data['imagebid'] . "'
        cpbid = '" . $data['cpbid'] . "'
    WHERE idencherir = '" . $data['id'] . "' 
    RETURNING idencherir";

    $res = $connex->query($sql);
    $id = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  } catch (PDOException $e) 
  { // si échec
    print "Erreur pour ajouter le enchere " . $data['nom'] . "  : " . $e->getMessage();
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
 * @param string $id id d'une enchères
 * @return void
*/
function delete_bid($id): void
{
  //Enregistre les modifications sur un achat par son id_bid

  $connex = connectionBDD();
  try {
    $sql = " DELETE FROM encherir WHERE idencherir = '" . $id . "'";
    $res = $connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
    // $resu=$res->fetchOne();
  } catch (PDOException $e) { // si échec
    print "Erreur pour la modification d'une enchères : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }

  disconnectionBDD($connex);
}

