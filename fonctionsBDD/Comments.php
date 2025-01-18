<?php
require_once BASE_PATH."/fonctionsBDD/ConnectionBDD.php";

function get_info_comment($id){
    //Récupère tout les commentaires d'une oeuvre par son id_oeuvre
    $connex=connectionBDD(); //Connexion à la BDD
    try{
      $sql="SELECT clients.prenomclient, clients.nomclient, clients.pseudoclient, oeuvres.nomoeuvre, 
      commenter.message, commenter.datecommentaire, artistes.nomartiste, 
      artistes.prenomartiste, artistes.pseudoartiste FROM commenter INNER JOIN oeuvres ON 
      commenter.refidoeuvre = oeuvres.idoeuvre INNER JOIN clients ON
       commenter.refidclient = clients.idclient INNER JOIN artistes ON
       artistes.idartiste = oeuvres.refidartiste WHERE oeuvres.idoeuvre = '".$id."'";
      print $sql;
      $res=$connex->query($sql);
      $resu=$res->fetchAll();
    }
    catch  (PDOException $e) { //Si échec
      print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
      $resu = [];
      die(""); //Arrêt du script
    }
    disconnectionBDD($connex);
    return $resu;
}
?>