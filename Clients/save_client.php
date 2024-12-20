<?php
require './../fonctionsBDD/Clients.php';
require_once './../Utils/marlene_fonction.php';


// on set la valeur du dir tmp
// ini_set('upload_tmp_dir', '/var/www/RT/2ALT5/image/');

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Saisie d'un client</title>
</head>

<body>
    <div class="container">

        <?php


        if ($_POST["nomclient"]) {
            $nom = $_POST["nomclient"];
        } else {
            $nom = "void";
        }

        if ($_POST["prenomclient"]) {
            $prenom = $_POST["prenomclient"];
        } else {
            $prenom = "juste";
        }

        if ($_POST["paysclient"]) {
            $pays = $_POST["paysclient"];
        } else {
            $pays = "juste";
        }

        if ($_POST["villeclient"]) {
            $ville = $_POST["villeclient"];
        } else {
            $ville = "la solitude";
        }
        if ($_POST["emailclient"]) {
            $email = $_POST["emailclient"];
        } else {
            $email = "la solitude";
        }

        if ($_POST["motdepasseclient"]) {
            $motdepasse = $_POST["motdepasseclient"];
        } else {
            $motdepasse = '2344235lsk';
        }
        
        $id = (isset($_POST['idclient'])) ? $_POST['idclient'] : 0 ;
        var_dump($id);
        $data = [
            "id" => $id,
            "nom" => $nom,
            "prenom" => $prenom,
            "pays" => $pays,
            "ville" => $ville,
            "email" => $email,
            "motdepasse" => $motdepasse,
        ];

        // on a nos data, on les envoie en bdd
        
        if($id == 0){
            $idclient = add_client($data);
        } else {

            $idclient = update_client_db($data);
        }

        if ($idclient) {
            // enregistrement ok on va sur la page du client modifier
            echo "modification du client OK !";
        } else {
            echo 'problème modification client';
        }
        
        // TODO : render_view du client modifier
        ?>
        <a  href="<?php echo "./show_client.php?id=".$idclient ?>"
            class="btn btn-info"
            role="button">
            Voir client
        </a>
        <a  href="<?php echo "./all_client.php" ?>"
            class="btn btn-primary"
            role="button">
            Admin clients
        </a>

    </div>
</body>

</html>