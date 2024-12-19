<?php
require_once "./../fonctionsBDD/ConnectionBDD.php";// déclaration du fichier contenant des fonctions pouvant être appelées

require_once './../fonctionsBDD/Clients.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <title>Modification client</title>
</head>
<body>
    <div class="container">

        <!-- on récupère les info clients pour inclure en value -->
        <!-- TODO: checker l'id -->
        <?php
        $id = intval($_GET["id"]);
        $client = get_client_by_id($id);
        ?>

        <!-- formulaire -->
        <form action="<?php echo "./save_client.php?id=".$client["idclient"] ?>" method="post">
        
            <input type="hidden" name="idclient" value="<?php echo $client['idclient'] ?>" >
            
            <div class="form-group">
                <label for="nomclient">Nom client :</label>
                <input type="text" name="nomclient" value="<?php echo $client['nomclient'] ?>">
            </div>
                <label for="prenomclient">Prenom client :</label>
                <input type="text" name="prenomclient" value="<?php echo $client["prenomclient"] ?>">
            <div class="form-group">
            </div>
                <label for="paysclient">Pays client :</label>
                <input type="text" name="paysclient" value="<?php echo $client["paysclient"] ?>">
            <div class="form-group">
            </div>
                <label for="villeclient">ville client :</label>
                <input type="text" name="villeclient" value="<?php echo $client["villeclient"] ?>">
            <div class="form-group">
            </div>
                <label for="emailclient">email client :</label>
                <input type="text" name="emailclient" value="<?php echo $client["emailclient"] ?>">
            <div class="form-group">
            </div>
                <label for="motdepasseclient">email client :</label>
                <input type="text" name="motdepasseclient" value="<?php echo $client["motdepasseclient"] ?>">
            </div>
            
            <button class="btn btn-success" type="submit">Envoyer</button>
        </form>
        <div class="d-flex">

            <a  href=" <?php echo "./show_client.php?id=".$client['idclient'] ?>" 
                class="btn btn-info" 
                role="button"> 
                    <?php echo "client ".$client['idclient'] ?>
            </a>
    
            <a  href=" <?php echo "./all_client.php" ?>" 
                class="btn btn-primary" 
                role="button"> 
                    <?php echo "Admin client" ?>
        </div>
        </a>
      </div>
</body>
</html>