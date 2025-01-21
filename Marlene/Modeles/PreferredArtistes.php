<?php
require_once __DIR__."/../Config/ConnexionDB.php";

/**
 *      fonction qui retourne certaine les informations des artistes préféré 
 *      ( fonction SELECT  )
 * 
 * @return array $resu list de certaine les informations des artistes préféré
*/
function get_all_preferredartiste(): array
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT
              clients.idclient AS idclient,
              clients.pseudoclient AS pseudoclient,
              artistes.pseudoartiste AS pseudoartiste,
              artistes.imageartiste AS imageartiste
            FROM clients
            INNER JOIN prefererartiste
              ON clients.idclient = prefererartiste.idclient
            INNER JOIN artistes
              ON prefererartiste.idartiste = artistes.idartiste
            ORDER BY artistes.idartiste;
        ";
      
    $res = $connex->query($sql);
    $resu = $res->fetchall();
    var_dump( $resu[0]);
  } catch (PDOException $e) { // si échec
    print "Erreur pour retourner les artistes : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

/**
 *      fonction qui retourne tous artiste préféré d'un client par son id 
 *      ( fonction SELECT  )
 * 
 * @param int $idclient id d'un client préféré
 * @return array $resu liste de toutes les informations d'un artiste préféré
*/
function get_preferredartiste_by_id_client(int $idclient)
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT
              clients.idclient AS idclient,
              -- clients.pseudoclient AS pseudoclient,
              artistes.idartiste AS idartiste,
              artistes.pseudoartiste AS pseudoartiste,
              artistes.imageartiste AS imageartiste
            FROM clients
            INNER JOIN prefererartiste
              ON clients.idclient = prefererartiste.idclient
            INNER JOIN artistes
              ON prefererartiste.idartiste = artistes.idartiste
            WHERE clients.idclient = '".$idclient."'
            ORDER BY artistes.idartiste
    ";
    $res = $connex->query($sql);
    $resu = $res->fetch();
  } catch (PDOException $e) { // si échec
    print "Erreur pour récupérer les artistes : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

/**
 *      fonction qui retourne tous client qui aime un artiste 
 *      ( fonction SELECT  )
 * 
 * @param int $idartiste id d'un artiste
 * @return array $resu liste de toutes les clients qui aime l'artiste
*/
function get_list_of_client_who_like_artiste(int $idartiste)
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT
              clients.idclient AS idclient,
              -- clients.pseudoclient AS pseudoclient,
              artistes.idartiste AS idartiste,
              artistes.pseudoartiste AS pseudoartiste,
              artistes.imageartiste AS imageartiste
            FROM clients
            INNER JOIN prefererartiste
              ON clients.idclient = prefererartiste.idclient
            INNER JOIN artistes
              ON prefererartiste.idartiste = artistes.idartiste
            WHERE clients.idclient = '".$idclient."'
            ORDER BY artistes.idartiste
    ";
    $res = $connex->query($sql);
    $resu = $res->fetch();
  } catch (PDOException $e) { // si échec
    print "Erreur pour récupérer les artistes : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

/**
 *      fonction qui enregistre un nouvel artiste préféré 
 *      ( fonction INSERT INTO  )
 * 
 * @param array $data données artiste préféré nécessaire
*/
function add_new_preferredartiste(array $data): void
{
  var_dump_pre($data);
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "INSERT INTO prefererartiste 
      (
        idclient, idartiste
      )
      VALUES 
      (
        '" . $data['idclient'] . "', '" . $data['idartiste'] . "'
      ) ";
    // print $sql;
    $connex->query($sql);
  } catch (PDOException $e) { // si échec
    print "Erreur pour ajouter l'artiste préféré  : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
}

/**
 *      fonction qui supprime un artiste préféré  
 *      ( fonction DELETE  )
 * 
 * 
 * @param array $data données artiste préféré nécessaire
*/
function delete_preferredartiste($data): void
{
  //Enregistre les modifications sur un preferredartiste par son id_preferredartiste

  $connex = connectionBDD();
  try {
    $sql = " DELETE FROM prefererartiste WHERE idclient = '" . $data['$idclient'] . "' AND idartiste = '" . $data['$idartiste'] . "'";
    $connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
    // $resu=$res->fetchOne();
  } catch (PDOException $e) { // si échec
    print "Erreur lors de la suppression du preferredartiste : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }

  disconnectionBDD($connex);
  // return $res;					
}


// /**
//  *      fonction qui retourne le mot de passe preferredartiste à partir de son pseudo ou email 
//  *      ( fonction SELECT  )
//  * 
//  * @param string $pseudo le pseudo ou l'email du preferredartiste
//  * @return string $passwd le mot de passe du preferredartiste
// */
// function get_preferredartiste_id(string $pseudo): string
// {
//   $connex = connectionBDD(); // on se connect
//   try {
//     $sql = "SELECT idpreferredartiste FROM prefererartiste WHERE emailpreferredartiste = '" . $pseudo . "' OR pseudopreferredartiste = '".$pseudo."'";
//     print($sql);
//     $res = $connex->query($sql);
//     $resu = $res->fetch()[0];
//     // echo "le mot de passe récupe en BDD: " . $resu;
//   } catch (PDOException $e) { // si échec
//     print "Erreur pour récupérer le mot de passe du preferredartiste : " . $e->getMessage();
//     $resu = "";
//     die(""); // Arrêt du script - sortie.
//   }
//   disconnectionBDD($connex);
//   // TODO VOIR si c'est bien le hash ou 1er élément
//   return $resu;
// }


/**
 *      fonction qui modifie les informations d'un preferredartiste et retourne son id 
 *      ( fonction UPDAT  )
 * 
 * @param string $password mot de passe à comparer.
 * @return int $id id du preferredartiste
*/
function update_preferredartiste_db(array $data, int $id): void
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "UPDATE preferredartiste 
            SET idclient = '" . $data['idclient'] . "', 
                idartiste = '" . $data['idartiste'] . "', 
            WHERE idpreferredartiste = '" . $id . "'";

    // $res = $connex->query($sql);
    $connex->query($sql);
    // $res = 
    // $id = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  } catch (PDOException $e) 
  { // si échec
    print "Erreur pour mettre à jour le preferredartiste " . $data['nom'] . "  : " . $e->getMessage();
    // $id = 0;
    die(""); // Arrêt du script - sortie.             imagepreferredartiste = '" . $data['imagepreferredartiste'] . "'
  }
  disconnectionBDD($connex);
  // return $id;
}

?>