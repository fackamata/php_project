<?php

require_once './../fonctionsBDD/Clients.php';
require_once "./../fonctionsBDD/ConnectionBDD.php";
require_once "./../Utils/marlene_fonction.php";
// déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <title>Tous les clients</title>
</head>
<body>
    
    <header>
        <?php include "./../View/templates/navbar.php" ?>
    </header>

    <h1 class="h1">Liste de tous les clients</h1>
    <div class="container d-flex">
        <?php
        $clients = get_all_clients();
        // pre_dump($clients[0]['nomclient']);
        // foreach($clients as $client){
        for ($i = 0; $i < count($clients) - 1; $i++) {
            $id = $clients[$i]['idclient'];
            // echo $clients[$i]['idclient'];
            ?>

            <div class="card mx-2" style="width: 18rem;">
            <img class="card-img-top" src="./../image/no_img.png" alt="Card image alt">
            <div class="card-body">
                <h5 class="card-title"><?php echo $clients[$i]["nomclient"]." ".$clients[$i]["prenomclient"] ?></h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                <a href="<?php echo "./show_client.php?id=".$clients[$i]['idclient']?>" class="btn btn-primary">Voir client</a>
            </div>
            </div>

        <?php } ?>
    </div>
    <footer>
        <?php include "./../View/templates/footer.php" ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>