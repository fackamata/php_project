<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Artistes.php';
require_once BASE_PATH.'/fonctionsBDD/Artworks.php';
 // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
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
            session_start();
            echo "<pre>";
            print_r($_SESSION);
            echo "</pre>";
            $info=get_info_artiste($_SESSION["idartiste"]);
            echo "<pre>";
            print_r($info);
            echo "</pre>";
        ?>
        <img src="./../upload/artiste".<?php echo $info["imageartiste"] ?> alt='<?php echo $info["pseudoartiste"]?>'>
        <p> Nom : <?php echo $info["nomartiste"] ?></p>
        <p> Prénom : <?php echo $info["prenomartiste"] ?></p>
        <p> Pseudo : <?php echo $info["pseudoartiste"] ?></p>
        <p> Email : <?php echo $info["emailartiste"] ?></p>
        <p> Ville : <?php echo $info["villeartiste"] ?></p>
        <p> Pays : <?php echo $info["paysartiste"] ?></p>
        <p> Description : <?php echo $info["descriptionartiste"] ?></p>
        <form method='POST' action='./edit_artiste.php'><button name='id_artiste' value='<?php echo serialize($info) ?>'>modifier</button></form>
	</header>
	<center>
        <br/><br/>
		<table border=1 bgcolor="#CCCCCC">
			<?php
                $collection=get_info_artwork_by_artist($_SESSION['idartiste']);
                foreach ($collection as $oeuvre){
                    echo $oeuvre['imageoeuvre'];
                    echo "<tr><td><img src='./../upload/".$oeuvre["imageoeuvre"]."' alt='".$oeuvre["nomoeuvre"]."'/></td></br>";
                    echo "<td>Nom : </td><td>".$oeuvre["nomoeuvre"]."</td></br>";
                    echo "<td>Description : </td><td>".$oeuvre["descriptionoeuvre"]."</td></tr></br>";
                    echo "<form method='POST' action='./../Oeuvres/edit_artwork.php'><button name='id_oeuvre' value='".serialize($oeuvre)."'>modifier</button></form>";
                    echo "<form method='POST' action='./../Coments/show_comments.php'><button name='id_oeuvre' value='".$oeuvre["idoeuvre"]."'>commentaire</button></form>";
                    echo "<form method='POST' action='./../Oeuvres/delete_artwork.php'><button name='id_oeuvre' value='".$oeuvre["idoeuvre"]."'>Supprimer</button></form>";
                    echo "<pre>";
                    print_r($oeuvre);
                    echo "</pre>";
                }
                echo "Ajouter une Oeuvre : ";
                echo "<form method='get' action='./../Oeuvres/add_artwork.php'><button name='idartiste' value='".$info["idartiste"]."'>Ajouter</button></form>";
            ?>
		</table>
        <a href="./../index.php">Home</a>
	</center>
</body>
</html>
