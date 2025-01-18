<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Artworks.php';
require_once BASE_PATH.'/fonctionsBDD/Types.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)
?>
<html>
<head>
  <title>Saisie d'un article</title>
  <meta charset="utf-8"/>
</head>
<body>
    <img src="<?php $_FILES['image']['tmp_name'][0] ?>" alt="<?php $_FILES['image']['tmp_name'][0] ?>">
    <?php
        session_start();
        $var = "";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
        $var=$var."'".$_POST["nomoeuvre"]."', ";
        $var=$var."'".$_POST["description"]."', ";
        $var=$var."'".$_POST["date"]."', ";
        $listtype=get_info_type(); //Gestin du type pour récupérer l'id du type
        foreach ($listtype as $type) {
            if ($type["nomtype"] == $_POST["type"]){
                $idtype = $type["idtype"];
            }
        }
        $var=$var."'".$idtype."', ";
        if (!(move_uploaded_file($_FILES['image']['tmp_name'], "../upload/".$_FILES['image']['name']))){
            $_FILES["image"]["name"] = 'no_img.png';
        }

        $var=$var."'".$_FILES["image"]["name"]."', ";

        $idartiste = $_SESSION["idartiste"];
        $var=$var."'".$idartiste."'";
        echo "</br> c'est var : ".$var."</br>";
        add_artwork($var);
        header('Location: ./../Artistes/artiste_account.php');
    ?>
	<p>Ajout pris en compte ! </p>
    
</body>
</html>
