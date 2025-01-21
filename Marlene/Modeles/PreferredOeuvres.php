<?php
require_once __DIR__."/../Config/ConnexionDB.php";

/**
 *      fonction qui retourne toutes les préférences d'oeuvres 
 *      ( fonction SELECT  )
 * 
 * @return array $resu list de toutes les préférences d'oeuvres
*/
function get_all_preferredoeuvre(): array
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT * FROM prefereroeuvre";
    $res = $connex->query($sql);
    $resu = $res->fetchall();
    // var_dump( $resu[0]);
  } catch (PDOException $e) { // si échec
    print "Erreur pour retourner les oeuvres préféré : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

/**
 *      fonction qui retourne toutes les oeuvres préféré d'un client 
 *      ( fonction SELECT  )
 * 
 * @param int $id id d'un client
 * @return array $resu liste de toutetes les oeuvres préféré d'un client
*/
function get_preferredoeuvre_by_id_client(int $id)
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT * FROM prefereroeuvre WHERE idclient = '" . $id . "'";
    $res = $connex->query($sql);
    $resu = $res->fetch();
  } catch (PDOException $e) { // si échec
    print "Erreur pour récupérer les oeuvres préféré : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}

/**
 *      fonction qui enregistre une nouvelle préférences d'oeuvre 
 *      ( fonction INSERT INTO  )
 * 
 * @param array $data idclient et idoeuvre
 * @return int $id id du preferredoeuvre nouvellement créé
*/
function add_new_preferredoeuvre(array $data): int
{
  var_dump_pre($data);
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "INSERT INTO prefereroeuvre 
      (
        idclient, idartiste
      )
      VALUES 
      (
        '" . $data['idclient'] . "', '" . $data['idartiste'] . "'
      ) ";
    print $sql;
    $res = $connex->query($sql);
    $id = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  } catch (PDOException $e) { // si échec
    print "Erreur pour ajouter une oeuvre préféré  : " . $e->getMessage();
    $id = 0;
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $id;
}

/**
 *      fonction qui supprime un preferredoeuvre  
 *      ( fonction DELETE  )
 * 
 * 
 * @param string $password mot de passe à comparer.
 * @param string $id id d'un preferredoeuvre
 * @return array $resu list de toutes les informations de les oeuvres
*/
function delete_preferredoeuvre($idclient, $idartiste): void
{
  //Enregistre les modifications sur un preferredoeuvre par son id_preferredoeuvre

  $connex = connectionBDD();
  try {
    $sql = " DELETE FROM prefereroeuvre WHERE idclient = '" . $idclient . "' AND idclient = '" . $idartiste . "'";
    $connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
    // $resu=$res->fetchOne();
  } catch (PDOException $e) { // si échec
    print "Erreur lors de la suppression d'une oeuvre préféré : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }

  disconnectionBDD($connex);
  // return $res;					
}


// /**
//  *      fonction qui retourne le mot de passe preferredoeuvre à partir de son pseudo ou email 
//  *      ( fonction SELECT  )
//  * 
//  * @param string $pseudo le pseudo ou l'email du preferredoeuvre
//  * @return string $passwd le mot de passe du preferredoeuvre
// */
// function get_preferredoeuvre_id(string $pseudo): string
// {
//   $connex = connectionBDD(); // on se connect
//   try {
//     $sql = "SELECT idpreferredoeuvre FROM prefereroeuvre WHERE emailpreferredoeuvre = '" . $pseudo . "' OR pseudopreferredoeuvre = '".$pseudo."'";
//     print($sql);
//     $res = $connex->query($sql);
//     $resu = $res->fetch()[0];
//     // echo "le mot de passe récupe en BDD: " . $resu;
//   } catch (PDOException $e) { // si échec
//     print "Erreur pour récupérer le mot de passe du preferredoeuvre : " . $e->getMessage();
//     $resu = "";
//     die(""); // Arrêt du script - sortie.
//   }
//   disconnectionBDD($connex);
//   // TODO VOIR si c'est bien le hash ou 1er élément
//   return $resu;
// }

  
// /**
//  *      fonction qui modifie les informations d'un preferredoeuvre et retourne son id 
//  *      ( fonction UPDAT  )
//  * 
//  * @param string $password mot de passe à comparer.
//  * @return int $id id du preferredoeuvre
// */
// function update_preferredoeuvre_db(array $data, int $id): void
// {
//   $connex = connectionBDD(); // on se connect
//   try {
//     $sql = "UPDATE preferredoeuvre 
//     SET idclient = '" . $data['idclient'] . "', 
//         idartiste = '" . $data['idartiste'] . "', 
//     WHERE idpreferredoeuvre = '" . $id . "'";

//     // $res = $connex->query($sql);
//     $connex->query($sql);
//     // $res = 
//     // $id = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
//   } catch (PDOException $e) 
//   { // si échec
//     print "Erreur pour mettre à jour le preferredoeuvre " . $data['nom'] . "  : " . $e->getMessage();
//     // $id = 0;
//     die(""); // Arrêt du script - sortie.             imagepreferredoeuvre = '" . $data['imagepreferredoeuvre'] . "'
//   }
//   disconnectionBDD($connex);
//   // return $id;
// }

?>