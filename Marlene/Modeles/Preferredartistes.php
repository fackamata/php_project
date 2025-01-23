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
              *
              -- ou on sélectionne uniquement ceux qu'on veux
              -- clients.idclient AS idclient,
              -- clients.pseudoclient AS pseudoclient,
              -- artistes.pseudoartiste AS pseudoartiste,
              -- artistes.idartiste AS idartiste
            FROM clients
            INNER JOIN prefererartiste
              ON clients.idclient = prefererartiste.idclient
            JOIN artistes
              ON prefererartiste.idartiste = artistes.idartiste
            ORDER BY artistes.idartiste;
        ";
      
    $res = $connex->query($sql);
    $resu = $res->fetchall();
    // var_dump( $resu[0]);
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
function get_preferredartiste_by_id_client(int $idclient):array
{
  $connex = connectionBDD(); // on se connect
  try {
    
    $sql = $connex->prepare(
      "SELECT
                  *
              FROM clients
              INNER JOIN prefererartiste
                ON clients.idclient = prefererartiste.idclient
              INNER JOIN artistes
                ON prefererartiste.idartiste = artistes.idartiste
              WHERE clients.idclient = :idclient
              ORDER BY artistes.idartiste
     ");
     
    //  WHERE clients.idclient = '".$idclient."'
$sql->bindParam(':idclient', $idclient);
$sql->execute(); 

// $sql = $sql->execute([$idclient]);
$resu = $sql->fetchall();
  } catch (PDOException $e) {
    print $resu;
    print "Erreur pour récupérer les artistes préférés du client : " . $e->getMessage();
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
    
    $sql = $connex->prepare(
           "SELECT
              clients.idclient AS idclient,
              -- clients.pseudoclient AS pseudoclient,
              -- artistes.idartiste AS idartiste,
              -- artistes.pseudoartiste AS pseudoartiste,
              -- artistes.imageartiste AS imageartiste
              -- artistes.imageartiste AS imageartiste
            FROM clients
            INNER JOIN prefererartiste
              ON clients.idclient = prefererartiste.idclient
            FULL JOIN artistes
              ON prefererartiste.idartiste = artistes.idartiste
            WHERE artistes.idartiste = ?
            ORDER BY artistes.idartiste
    ");

    $sql->bindParam(':idclient', $idclient);
    $sql->execute(); 

    // $res = $sql->execute([$idartiste]);
    $resu = $sql->fetchall();
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
  // var_dump_pre($data);
  $connex = connectionBDD(); // on se connect
  try {
    $sql = $connex->prepare("
    INSERT INTO prefererartiste (
      idclient, idartiste ) 
      VALUES ( :idclient, :idartiste )
      ");

    // $sql = "INSERT INTO prefererartiste 
    //   (
    //     idclient, idartiste
    //   )
    //   VALUES 
    //   (
    //     '" . $data['idclient'] . "', '" . $data['idartiste'] . "'
    //   ) ";
    // print $sql;
    
    $sql->bindParam(':idclient', $data['idclient'], PDO::PARAM_STR);
    $sql->bindParam(':idartiste', $data['idartiste'], PDO::PARAM_STR);
    $sql->execute(); 

    // $connex->query($sql);
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
 * @param int $idclient l'id du client concerné  
 * @param int $idartiste l'id de l'artiste concerné  
*/
function delete_preferredartiste($idclient, $idartiste): void
{
  $connex = connectionBDD();
  try {
    
    $sql = $connex->prepare("DELETE FROM prefererartiste WHERE idclient = :idclient AND idartiste = :idartiste ");
    $sql->bindValue(':idclient', $idclient, PDO::PARAM_INT);
    $sql->bindValue(':idartiste', $idartiste, PDO::PARAM_INT);
    $sql->execute(); 

  } catch (PDOException $e) { // si échec
    print "Erreur lors de la suppression du preferredartiste : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
}


?>