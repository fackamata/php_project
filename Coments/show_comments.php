<?php
require './../config.php';
require_once './../fonctionsBDD/Comments.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)

?>
<html>
	<head>
		<title> Liste des articles</title>
		<meta charset="utf-8"/>
	</head>
	<body>
        <?php
			print_r($_POST);
			$listcom = get_info_comment($_POST["id_oeuvre"]);
			echo "<pre>";
			print_r($listcom);
			echo "</pre>";
			foreach($listcom as $com){
				$client = $com["nomclient"]." ".$com["prenomclient"];
				$artiste = $com["nomartiste"]." ".$com["prenomartiste"];
				echo "<div><h3>".$client." : </h3><p>".$com["nomoeuvre"]." (".$artiste.")</p><p>".$com["message"]."</p><p>".$com["datecommentaire"]."</p></div>";
				echo "</br>";
			}
		?>
		<a href="javascript:history.back()">Retour à la page de l'artiste</a>
    </body>
</html>