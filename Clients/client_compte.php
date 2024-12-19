<?php
require_once './fonctionsBDD/ConnexionBDD.php'; // déclaration du fichier contenant des fonctions pouvant être appelées
$conn1=connectionBDD('paramCon.php'); // appel de la fonction connexionBDD. Le résultat retourné sera dans la variable $conn1
// a partir d'ici, on est connecté à la BDD acec le connecteur $conn1

require_once './fonctionsBDD/Clients.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)

?>
<html>
<head>
  <!-- Affichage du parametre dans le titre dela page -->
   <!--<script defer src="./artiste_compte.js"></script>-->
  <title>Saisie d'un article</title>
  <meta charset="utf-8"/>
</head>
<body>
	<header>
		<?php
            $info=get_info_client($_GET["name"],$conn1);
            //print $info;
            echo "<p> Nom : ".$info["nomclient"]."</p>";
            echo "<p> Prenom : ".$info["prenom"]."</p>";
            echo "<p> Email : ".$info["email"]."</p>";
            echo "<p> Ville : ".$info["ville"]."</p>";
            echo "<p> Pays : ".$info["pays"]."</p>";
            echo "<p> Description : ".$info["description"]."</p>";
		?>
	</header>
	<center>
    </center>
</body>
</html>
