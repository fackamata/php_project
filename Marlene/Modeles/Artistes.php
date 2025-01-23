<?php
/**
 *    Module pour gérer la table artiste 
 *  
 */

require_once __DIR__."/../Config/ConnexionDB.php";

/**
 *      fonction qui retourne toutes les informations de tous les achats 
 *      ( fonction SELECT  )
 * 
 * @return array $resu list de toutes les informations de tous les achats
*/
function get_all_artistes(): array
{
  $connex = connectionBDD(); // on se connect
  try {
    $sql = "SELECT * FROM artistes ORDER BY idartiste";
    $res = $connex->query($sql);
    $resu = $res->fetchall();
  } catch (PDOException $e) { // si échec
    print "Erreur pour retourner tous les artiste : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}