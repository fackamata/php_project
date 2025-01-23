<?php
/**
 *    Module pour gérer la table object 
 *  
 */

require_once __DIR__."/../Config/ConnexionDB.php";

/**
 *      fonction qui retourne toutes les informations de toutes les objects 
 *      ( fonction SELECT  )
 * 
 * @return array $resu list de toutes les informations de toutes les objects
*/
function get_goodie_by_id($id): array
{
  
  $connex = connectionBDD(); // on se connect
  try {
    $id = intval($id);
    $sql = $connex->prepare("SELECT * FROM objects WHERE idobject = ?");
    $sql->execute([intval($id)]); 
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
 *      fonction qui retourne toutes les informations de toutes les objects 
 *      ( fonction SELECT  )
 * 
 * @return array $resu list de toutes les informations de toutes les objects
*/
function get_goodie_related_artwork_and_artiste($id): array
{
  
  $connex = connectionBDD(); // on se connect
  try {
    $id = intval($id);
    $sql = $connex->prepare(
  "SELECT
        *
        FROM objects
        INNER JOIN oeuvres
        ON objects.refidoeuvre = oeuvres.idoeuvre
        INNER JOIN artistes
        ON oeuvres.refidartiste = artistes.idartiste
        WHERE objects.idobject = :id"
        );
    $sql->execute([intval($id)]); 
    $resu = $sql->fetch();

  } catch (PDOException $e) { // si échec
    print "Erreur pour récupérer tous les artistes et oeuvres lié : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;

}


