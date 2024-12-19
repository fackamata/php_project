<?php
require_once './../fonctionsBDD/ConnexionBDD.php'; // déclaration du fichier contenant des fonctions pouvant être appelées
$conn1=connexionBDD('./../Utils/paramCon.php'); // appel de la fonction connexionBDD. Le résultat retourné sera dans la variable $conn1
// a partir d'ici, on est connecté à la BDD acec le connecteur $conn1

require_once './../fonctionsBDD/Clients.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)
?>
<html>
<head>
  <!-- Affichage du parametre dans le titre dela page -->
   <!-- <script defer src="./client_compte.js"></script> -->
  <title>Saisie d'un client</title>
  <meta charset="utf-8"/>
</head>
<body>
	<header>
		
	</header>

	<center>
        <?php
            $idclient=$_GET["idclient"];
            echo "<pre>";
            print_r($_GET);
            echo "</pre>";
            $listtype=get_info_type($conn1);
            echo "<form method='POST' action='./enregistreajout_oeuvre.php' enctype='multipart/form-data'>";
            echo "Nom de l'oeuvre : <input type='text' name='nomoeuvre' placeholder='La Joconde' required></br>";
            echo "Description de l'oeuvre : <input type='text' name='description' placeholder='Tableau de Léonard de Vinci...'></br>";
            echo "Image de l'oeuvre : <input type='file' name='image[]' accept='image/*' multiple></br>";
            echo "Date de l'oeuvre : <input type='date' name='date' value='".date("Y-m-d")."'></br>";
            echo "Type de l'oeuvre : <select name='type' required>";
            echo "<option value='' selected></option>";
            foreach ($listtype as $type) {
                echo "<option value='".$type["nomtype"]."'>".$type["nomtype"]."</option>";
            }
            echo "</select></br>";
            echo "<input type='hidden' name='idclient' value='".$idclient."'>";
            echo "<input type='submit' value='Ajouter'>";
            echo "</form>";
        ?>
        <?php echo "/?c=home&f=index&i=".$data['id'] ?>
        <a href=<?php "./Clients/client_by_id.php?i=".$clients['id'] ?>>Retour à la page du client</a>
    </center>
</body>
</html>
