<?php
require_once "./../fonctionsBDD/Clients.php";
// déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <title>Admin clients</title>
</head>
<body>
    
    <header>
        <?php include "./../View/templates/navbar.php" ?>
    </header>
    
    <div class="container">

        <h1 class="mb-3">Page d'administration des clients</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Tel.</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                
                   
                <?php


                $clients = get_all_clients();
                // pre_dump($clients[0]['nomclient']);
                // foreach($clients as $client){
                for ($i = 0; $i < count($clients) - 1; $i++) {
                    $id = $clients[$i]['idclient'];
                    echo $clients[$i]['idclient'];
                    ?>
                    <tr> 
                    
                    <th scope="row"><?php echo $clients[$i]['idclient'] ?></th>

                    <td><?php echo $clients[$i]['idclient'] ?></td>
                    <td><?php echo $clients[$i]['nomclient'] ?></td>
                    <td><?php echo $clients[$i]['prenomclient'] ?></td>
                    <td><?php echo $clients[$i]['paysclient'] ?></td>
                    <td><?php echo $clients[$i]['villeclient'] ?></td>

                    <td class="d-flex">
                        <a href="<?php echo "./show_client.php?id=".$id ?>" 
                            class="btn btn-info" 
                            role="button" >
                            Voir
                        </a>
                        <a href="<?php echo "./update_client.php?id=".$id ?>" 
                            class="btn btn-warning mx-3" 
                            role="button" >
                            Éditer
                        </a>

                        <a href="<?php echo "./delete_client.php?id=".$id ?>" 
                            class="btn btn-danger" 
                            role="button" >
                            Supprimer
                        </a>
                    </td>

                    </tr>    
                <?php } ?>

                

            </tbody>
        </table>
    </div>


    <a  href="./add_client.php" 
        class="btn btn-success">
        ajout client
    </a>
    <footer>
        <?php include "./../View/templates/footer.php" ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>