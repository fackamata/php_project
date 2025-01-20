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
    $sql = "SELECT * FROM acheter ORDER BY idacheter";
    $res = $connex->query($sql);
    // echo $res->fetch_all(MYSQLI_ASSOC);
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
 *      fonction qui retourne toutes les informations d'une achat 
 *      ( fonction SELECT  )
 * 
 * @param int $id id d'une achat
 * @return array $resu liste de toutes les informations d'une achat
*/
function get_buy_by_id(int $id): array
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT * FROM acheter WHERE idacheter = '" . $id . "'";
    $res = $connex->query($sql);
    $resu = $res->fetch();
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
    $sql = "INSERT INTO buys 
      (
        nombuy, prenombuy, adressebuy, villebuy, emailbuy, motdepassebuy, pseudobuy, imagebuy, cpbuy
      )
      VALUES 
      (
        '" . $data['nom'] . "', '" . $data['prenom'] . "', '" . $data['adresse'] . "', '" . $data['ville'] . "', '" . $data['email'] .
      "', '" . $data['motdepasse'] . "', '" . $data['pseudobuy'] . "', '" . $data['imagebuy'] . "', '" . $data['cpbuy'] . "'
      ) 
      RETURNING idacheter";
    $res = $connex->query($sql);
    $id = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  } catch (PDOException $e) { // si échec
    print "Erreur pour ajouter le buys " . $data['nom'] . "  : " . $e->getMessage();
    $id = 0;
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $id;
}


/**
 *      fonction qui modifie les informations d'une achat et retourne son id 
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
 * @param string $id id d'une achat
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
    print "Erreur pour la modification d'une achat : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }

  disconnectionBDD($connex);
}

