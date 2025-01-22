<div class="container-fluid">

    <h1 class="my-3 text-center">Page d'administration des client</h1>

    <div class="d-flex justify-content-end">
        <a href="<?php echo MARLENE_PATH."home.php/?ctrl=client&fct=display_add_client" ?>" 
                            class="btn btn-success mx-3" 
                            role="button" >
                            Créer Client
        </a>
    </div>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Adresse</th>
                <th scope="col">CP</th>
                <th scope="col">Ville</th>
            </tr>
        </thead>
        <tbody> 
            <?php
            $client = $data['clients']; 

            for ($i = 0; $i < count($client); $i++) {
                $id = $client[$i]['idclient'];
                ?> 

                <tr> 
                <th scope="row"><?php echo $client[$i]['idclient'] ?></th>

                <td><?php echo $client[$i]['pseudoclient'] ?></td>
                <td><?php echo $client[$i]['nomclient'] ?></td>
                <td><?php echo $client[$i]['prenomclient'] ?></td>
                <td><?php echo $client[$i]['emailclient'] ?></td>
                <td><?php echo $client[$i]['adresseclient'] ?></td>
                <td><?php echo $client[$i]['cpclient'] ?></td>
                <td><?php echo $client[$i]['villeclient'] ?></td>
                <!-- <td> -->
                    <?php 
                //echo $client[$i]['imageclient'] ?>
                <!-- </td> -->

                <td class="d-flex justify-content-evenly">
                    <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=client&fct=display_show_client&id=".$id ?>" 
                        class="btn btn-info" 
                        role="button" >
                        Voir
                    </a>
                    <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=client&fct=display_update_client&id=".$id ?>" 
                        class="btn btn-warning mx-3" 
                        role="button" >
                        Éditer
                    </a>

                    <a href="<?php echo SRV_PATH."Marlene/home.php/?ctrl=client&fct=remove_client&id=".$id?>" 
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